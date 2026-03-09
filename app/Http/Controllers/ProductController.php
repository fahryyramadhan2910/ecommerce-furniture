<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->category && in_array($request->category, ['chairs', 'tables', 'sofas'])) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product  = Product::where('slug', $slug)->firstOrFail();
        $related  = Product::where('category', $product->category)
                        ->where('id', '!=', $product->id)
                        ->take(4)->get();

        return view('products.show', compact('product', 'related'));
    }
}
