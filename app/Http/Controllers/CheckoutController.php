<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong!');
        }

        $total = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart));

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|min:10',
            'payment_method' => 'nullable|string', // Midtrans handles payment method
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        $total = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart));

        $order = Order::create([
            'invoice'        => 'INV-' . strtoupper(Str::random(8)),
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'total'          => $total,
            // 'payment_method' => $request->payment_method, // Removed because Midtrans handles this
            'status'         => 'pending',
            'notes'          => $request->notes,
        ]);

        // Midtrans Configuration
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');
        
        // Disable SSL verification for local development (curl error 60 fix)
        // Note: In production, it's better to configure absolute path to cacert.pem in php.ini
        if (app()->environment('local')) {
            \Midtrans\Config::$curlOptions = [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HTTPHEADER => [] // Fix Midtrans SDK bug undefined array key 10023
            ];
        }

        $itemDetails = [];
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['id'],
                'qty'        => $item['qty'],
                'price'      => $item['price'],
            ]);

            // Reduce stock
            Product::where('id', $item['id'])
                   ->decrement('stock', $item['qty']);

            $itemDetails[] = [
                'id'       => $item['id'],
                'price'    => $item['price'],
                'quantity' => $item['qty'],
                'name'     => substr($item['title'], 0, 50), // Midtrans limit
            ];
        }

        $payload = [
            'transaction_details' => [
                'order_id'     => $order->invoice,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $order->name,
                'email'      => $order->email,
                'phone'      => $order->phone,
                'billing_address'  => [
                    'first_name' => $order->name,
                    'email'      => $order->email,
                    'phone'      => $order->phone,
                    'address'    => $order->address,
                ],
                'shipping_address' => [
                    'first_name' => $order->name,
                    'email'      => $order->email,
                    'phone'      => $order->phone,
                    'address'    => $order->address,
                ],
            ],
            'item_details' => $itemDetails,
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $order->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            // Revert stock or handle error if Midtrans fails
            return back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->invoice);
    }

    public function success($invoice)
    {
        $order = Order::where('invoice', $invoice)
                      ->with('items.product')
                      ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
