@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan aktivitas toko Anda')

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    @foreach([
        ['label' => 'Total Produk', 'value' => $totalProducts, 'icon' => '📦', 'color' => 'bg-blue-50 text-blue-600', 'link' => route('admin.products.index')],
        ['label' => 'Total Pesanan', 'value' => $totalOrders, 'icon' => '📋', 'color' => 'bg-warm-100 text-warm-700', 'link' => route('admin.orders.index')],
        ['label' => 'Pendapatan (Success)', 'value' => 'Rp ' . number_format($totalRevenue, 0, ',', '.'), 'icon' => '💰', 'color' => 'bg-emerald-50 text-emerald-600', 'link' => route('admin.orders.index', ['status' => 'success'])],
        ['label' => 'Pesanan Pending', 'value' => $pendingOrders, 'icon' => '⏳', 'color' => 'bg-amber-50 text-amber-600', 'link' => route('admin.orders.index', ['status' => 'pending'])],
    ] as $stat)
    <a href="{{ $stat['link'] }}"
       class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 block">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 {{ $stat['color'] }} rounded-2xl flex items-center justify-center text-2xl">
                {{ $stat['icon'] }}
            </div>
            <svg class="w-4 h-4 text-warm-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </div>
        <p class="text-warm-500 text-sm font-medium">{{ $stat['label'] }}</p>
        <p class="text-warm-900 text-2xl font-bold font-serif mt-1">{{ $stat['value'] }}</p>
    </a>
    @endforeach
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Recent Orders --}}
    <div class="xl:col-span-2 bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-warm-100 flex items-center justify-between">
            <h2 class="font-serif font-bold text-warm-900">Pesanan Terbaru</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-primary-600 text-sm font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-warm-50 border-b border-warm-100">
                        <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Invoice</th>
                        <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Pelanggan</th>
                        <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Total</th>
                        <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-warm-50">
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-warm-50 transition">
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="font-mono text-primary-600 font-semibold hover:underline">
                                {{ $order->invoice }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-warm-900">{{ $order->name }}</p>
                            <p class="text-warm-400 text-xs">{{ $order->email }}</p>
                        </td>
                        <td class="px-6 py-4 font-semibold text-warm-900">{{ $order->formatted_total }}</td>
                        <td class="px-6 py-4">
                            <span class="{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-warm-400">Belum ada pesanan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Low Stock --}}
    <div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-warm-100">
            <h2 class="font-serif font-bold text-warm-900">⚠️ Stok Hampir Habis</h2>
        </div>
        <div class="p-4 space-y-3 max-h-80 overflow-y-auto">
            @forelse($lowStock as $p)
            <div class="flex items-center gap-3 p-3 rounded-xl bg-warm-50 hover:bg-warm-100 transition">
                <img src="{{ $p->image_url }}" alt="{{ $p->title }}"
                     class="w-10 h-10 object-cover rounded-lg shrink-0">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-warm-900 line-clamp-1">{{ $p->title }}</p>
                    <p class="text-xs text-red-500 font-semibold">Sisa {{ $p->stock }} unit</p>
                </div>
                <a href="{{ route('admin.products.edit', $p) }}" class="text-primary-600 hover:text-primary-800 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </a>
            </div>
            @empty
            <div class="text-center py-8 text-warm-400">
                <p class="text-3xl mb-2">✅</p>
                <p class="text-sm">Semua stok aman</p>
            </div>
            @endforelse
        </div>
        <div class="px-4 pb-4">
            <a href="{{ route('admin.products.index') }}" class="btn-ghost w-full justify-center text-sm">Kelola Produk →</a>
        </div>
    </div>
</div>

@endsection
