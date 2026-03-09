<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts    = Product::count();
        $totalOrders      = Order::count();
        $totalRevenue     = Order::where('status', 'success')->sum('total');
        $pendingOrders    = Order::where('status', 'pending')->count();
        $recentOrders     = Order::latest()->take(8)->get();
        $lowStock         = Product::where('stock', '<', 5)->get();

        return view('admin.dashboard.index', compact(
            'totalProducts', 'totalOrders', 'totalRevenue',
            'pendingOrders', 'recentOrders', 'lowStock'
        ));
    }
}
