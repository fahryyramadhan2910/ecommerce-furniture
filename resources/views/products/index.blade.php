@extends('layouts.app')

@section('title', 'Semua Produk — Luxe Furniture')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Page header --}}
    <div class="mb-10">
        <h1 class="section-title">Koleksi Produk</h1>
        <p class="section-subtitle">{{ $products->total() }} produk furnitur premium tersedia</p>
    </div>

    {{-- Category Filter Tabs --}}
    <div class="flex flex-wrap gap-3 mb-8">
        <a href="{{ route('products.index') }}"
           class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200
                  {{ !request('category') ? 'bg-primary-600 text-white shadow-md' : 'bg-white border border-warm-200 text-warm-700 hover:border-primary-400 hover:text-primary-600' }}">
            Semua ({{ \App\Models\Product::count() }})
        </a>
        @foreach(['chairs' => '🪑 Kursi', 'tables' => '🪵 Meja', 'sofas' => '🛋️ Sofa', 'beds' => '🛏️ Tempat Tidur'] as $key => $label)
        <a href="{{ route('products.index', ['category' => $key]) }}"
           class="px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200
                  {{ request('category') == $key ? 'bg-primary-600 text-white shadow-md' : 'bg-white border border-warm-200 text-warm-700 hover:border-primary-400 hover:text-primary-600' }}">
            {{ $label }} ({{ \App\Models\Product::where('category', $key)->count() }})
        </a>
        @endforeach
    </div>

    {{-- Product Grid --}}
    @if($products->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="card-product group" id="product-{{ $product->id }}">
            <a href="{{ route('products.show', $product->slug) }}">
                <div class="relative overflow-hidden h-52">
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @if($product->is_featured)
                    <div class="absolute top-3 left-3">
                        <span class="bg-primary-600 text-white text-xs font-bold px-2.5 py-1 rounded-full">⭐ Unggulan</span>
                    </div>
                    @endif
                    @if($product->stock < 5)
                    <div class="absolute top-3 right-3">
                        <span class="bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">Stok Terbatas</span>
                    </div>
                    @endif
                </div>
            </a>
            <div class="p-5">
                <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider">{{ $product->category_label }}</span>
                <a href="{{ route('products.show', $product->slug) }}">
                    <h3 class="font-serif font-semibold text-warm-900 mt-1 mb-2 hover:text-primary-600 transition line-clamp-2 text-base leading-snug">
                        {{ $product->title }}
                    </h3>
                </a>
                <p class="text-warm-500 text-sm line-clamp-2 leading-relaxed">{{ $product->description }}</p>

                <div class="flex items-center justify-between mt-4 pt-4 border-t border-warm-100">
                    <div>
                        <div class="text-primary-700 font-bold text-lg">{{ $product->formatted_price }}</div>
                        <div class="text-warm-400 text-xs mt-0.5">Stok: {{ $product->stock }}</div>
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit"
                                class="flex items-center gap-1.5 px-3 py-2 bg-primary-600 text-white rounded-xl text-sm font-semibold hover:bg-primary-700 active:scale-95 transition-all shadow">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $products->links() }}
    </div>

    @else
    <div class="text-center py-24">
        <div class="text-6xl mb-5">📦</div>
        <h3 class="font-serif text-2xl font-bold text-warm-700 mb-2">Tidak Ada Produk</h3>
        <p class="text-warm-400">Produk untuk kategori ini belum tersedia.</p>
        <a href="{{ route('products.index') }}" class="btn-primary mt-6">Lihat Semua Produk</a>
    </div>
    @endif

</div>
@endsection
