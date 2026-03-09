@extends('layouts.app')

@section('title', $product->title . ' — Luxe Furniture')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-warm-500 mb-10">
        <a href="{{ route('home') }}" class="hover:text-primary-600 transition">Beranda</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-primary-600 transition">Produk</a>
        <span>/</span>
        <a href="{{ route('products.index', ['category' => $product->category]) }}" class="hover:text-primary-600 transition">{{ $product->category_label }}</a>
        <span>/</span>
        <span class="text-warm-900 font-medium">{{ $product->title }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        {{-- Product Image --}}
        <div class="sticky top-20">
            <div class="relative rounded-2xl overflow-hidden aspect-square shadow-xl bg-warm-100">
                <img src="{{ $product->image_url }}"
                     alt="{{ $product->title }}"
                     class="w-full h-full object-cover">
                @if($product->is_featured)
                <div class="absolute top-4 left-4">
                    <span class="bg-primary-600 text-white text-sm font-bold px-3 py-1.5 rounded-full shadow">⭐ Unggulan</span>
                </div>
                @endif
            </div>
        </div>

        {{-- Product Info --}}
        <div x-data="{ qty: 1 }">
            <span class="inline-block text-primary-600 text-sm font-semibold uppercase tracking-wider mb-3 border border-primary-200 px-3 py-1 rounded-full">
                {{ $product->category_label }}
            </span>

            <h1 class="font-serif text-4xl font-bold text-warm-900 leading-tight mb-4">
                {{ $product->title }}
            </h1>

            <div class="flex items-center gap-4 mb-6">
                <span class="text-3xl font-bold text-primary-700">{{ $product->formatted_price }}</span>
                <div class="flex items-center gap-1">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                    <span class="text-warm-500 text-sm ml-1">(48 ulasan)</span>
                </div>
            </div>

            <p class="text-warm-600 leading-relaxed mb-8 text-base">{{ $product->description }}</p>

            {{-- Stock indicator --}}
            <div class="flex items-center gap-2 mb-6">
                @if($product->stock > 10)
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500"></div>
                    <span class="text-emerald-700 font-semibold text-sm">Stok Tersedia ({{ $product->stock }} unit)</span>
                @elseif($product->stock > 0)
                    <div class="w-2.5 h-2.5 rounded-full bg-amber-500"></div>
                    <span class="text-amber-700 font-semibold text-sm">Stok Terbatas ({{ $product->stock }} unit tersisa)</span>
                @else
                    <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                    <span class="text-red-700 font-semibold text-sm">Stok Habis</span>
                @endif
            </div>

            {{-- Qty Selector + Add to Cart --}}
            @if($product->stock > 0)
            <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="flex items-center gap-4">
                    <label class="form-label mb-0">Jumlah:</label>
                    <div class="flex items-center border-2 border-warm-200 rounded-xl overflow-hidden bg-white">
                        <button type="button"
                                @click="qty = Math.max(1, qty-1)"
                                class="w-10 h-10 flex items-center justify-center text-warm-600 hover:bg-warm-100 transition font-bold text-lg">
                            −
                        </button>
                        <input type="number" name="qty" x-model="qty" min="1" max="{{ $product->stock }}"
                               class="w-14 text-center font-semibold text-warm-900 bg-transparent outline-none border-x border-warm-200 h-10">
                        <button type="button"
                                @click="qty = Math.min({{ $product->stock }}, qty+1)"
                                class="w-10 h-10 flex items-center justify-center text-warm-600 hover:bg-warm-100 transition font-bold text-lg">
                            +
                        </button>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="btn-primary flex-1 py-4 text-base">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Tambahkan ke Keranjang
                    </button>
                    <a href="{{ route('cart.index') }}" class="btn-secondary py-4 px-6 text-base">
                        Beli Sekarang
                    </a>
                </div>
            </form>
            @endif

            {{-- Features --}}
            <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t border-warm-200">
                @foreach([['🚚','Gratis Kirim','Min. Rp 500K'], ['🛡️','Garansi','2 Tahun Penuh'], ['↩️','Return','30 Hari']] as $f)
                <div class="text-center p-3 rounded-xl bg-warm-50">
                    <div class="text-2xl mb-1">{{ $f[0] }}</div>
                    <div class="text-xs font-bold text-warm-800">{{ $f[1] }}</div>
                    <div class="text-xs text-warm-500">{{ $f[2] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Related Products --}}
    @if($related->count() > 0)
    <div class="mt-20">
        <h2 class="section-title mb-8">Produk Terkait</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($related as $item)
            <div class="card-product group">
                <a href="{{ route('products.show', $item->slug) }}">
                    <div class="overflow-hidden h-48">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                </a>
                <div class="p-4">
                    <a href="{{ route('products.show', $item->slug) }}">
                        <h3 class="font-serif font-semibold text-warm-900 hover:text-primary-600 transition line-clamp-2">{{ $item->title }}</h3>
                    </a>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-primary-700 font-bold">{{ $item->formatted_price }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="qty" value="1">
                            <button class="w-8 h-8 bg-primary-600 text-white rounded-lg flex items-center justify-center hover:bg-primary-700 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
