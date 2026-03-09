<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'payment_method' => 'required|in:bank_transfer,ovo,dana,qris',
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
            'payment_method' => $request->payment_method,
            'status'         => 'pending',
            'notes'          => $request->notes,
        ]);

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
