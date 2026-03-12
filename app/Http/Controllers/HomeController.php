<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::featured()->take(4)->get();
        $chairs   = Product::category('chairs')->take(3)->get();
        $tables   = Product::category('tables')->take(3)->get();
        $sofas    = Product::category('sofas')->take(3)->get();
        $beds     = Product::category('beds')->take(3)->get();

        return view('home.index', compact('featured', 'chairs', 'tables', 'sofas', 'beds'));
    }
}
