<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function getCart(): array
    {
        return session('cart', []);
    }

    private function saveCart(array $cart): void
    {
        session(['cart' => $cart]);
    }

    public function index()
    {
        $cart  = $this->getCart();
        $total = array_sum(array_map(fn($i) => $i['price'] * $i['qty'], $cart));

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty'        => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart    = $this->getCart();
        $key     = 'product_' . $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += (int) $request->qty;
        } else {
            $cart[$key] = [
                'id'    => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image_url,
                'slug'  => $product->slug,
                'qty'   => (int) $request->qty,
            ];
        }

        // Enforce stock limit
        if ($cart[$key]['qty'] > $product->stock) {
            $cart[$key]['qty'] = $product->stock;
        }

        $this->saveCart($cart);

        return redirect()->back()->with('success', "\"{$product->title}\" ditambahkan ke keranjang!");
    }

    public function update(Request $request, $productId)
    {
        $request->validate(['qty' => 'required|integer|min:1']);

        $cart = $this->getCart();
        $key  = 'product_' . $productId;

        if (isset($cart[$key])) {
            $product = Product::find($productId);
            $qty = min((int)$request->qty, $product ? $product->stock : 99);
            $cart[$key]['qty'] = $qty;
            $this->saveCart($cart);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang diperbarui.');
    }

    public function remove($productId)
    {
        $cart = $this->getCart();
        unset($cart['product_' . $productId]);
        $this->saveCart($cart);

        return redirect()->route('cart.index')->with('success', 'Item dihapus dari keranjang.');
    }

    public function count()
    {
        $cart = $this->getCart();
        return response()->json(['count' => count($cart)]);
    }
}
