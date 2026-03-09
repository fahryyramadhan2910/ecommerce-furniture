<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Luxe Furniture — Premium Home Furniture')</title>
    <meta name="description" content="@yield('meta_description', 'Temukan koleksi furnitur premium untuk rumah impian Anda. Kualitas terbaik, desain elegan.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-warm-50" x-data>

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 bg-glass border-b border-warm-200 shadow-sm"
         x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center shadow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="font-serif text-xl font-bold text-warm-900">Luxe<span class="text-primary-600">Furniture</span></span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-primary-600 font-semibold' : '' }}">Beranda</a>
                    <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'text-primary-600 font-semibold' : '' }}">Produk</a>
                    <a href="{{ route('products.index', ['category' => 'chairs']) }}" class="nav-link">Kursi</a>
                    <a href="{{ route('products.index', ['category' => 'tables']) }}" class="nav-link">Meja</a>
                    <a href="{{ route('products.index', ['category' => 'sofas']) }}" class="nav-link">Sofa</a>
                </div>

                {{-- Cart Icon --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('cart.index') }}"
                       class="relative p-2 text-warm-700 hover:text-primary-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        @php $cartCount = count(session('cart', [])); @endphp
                        @if($cartCount > 0)
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-primary-600 text-white text-xs font-bold rounded-full flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                        @endif
                    </a>

                    {{-- Mobile hamburger --}}
                    <button class="md:hidden p-2 text-warm-700" @click="open = !open">
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile menu --}}
            <div x-show="open" x-transition class="md:hidden border-t border-warm-200 py-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-warm-700 hover:text-primary-600 font-medium rounded-lg hover:bg-warm-100 transition">Beranda</a>
                <a href="{{ route('products.index') }}" class="block px-3 py-2 text-warm-700 hover:text-primary-600 font-medium rounded-lg hover:bg-warm-100 transition">Semua Produk</a>
                <a href="{{ route('products.index', ['category' => 'chairs']) }}" class="block px-3 py-2 text-warm-700 hover:text-primary-600 font-medium rounded-lg hover:bg-warm-100 transition">Kursi</a>
                <a href="{{ route('products.index', ['category' => 'tables']) }}" class="block px-3 py-2 text-warm-700 hover:text-primary-600 font-medium rounded-lg hover:bg-warm-100 transition">Meja</a>
                <a href="{{ route('products.index', ['category' => 'sofas']) }}" class="block px-3 py-2 text-warm-700 hover:text-primary-600 font-medium rounded-lg hover:bg-warm-100 transition">Sofa</a>
            </div>
        </div>
    </nav>

    {{-- Flash messages --}}
    @if(session('success'))
    <div class="fixed top-20 right-4 z-50 max-w-sm animate-slide-up"
         x-data="{ show: true }" x-show="show" x-transition
         x-init="setTimeout(() => show = false, 4000)">
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-lg flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="fixed top-20 right-4 z-50 max-w-sm animate-slide-up"
         x-data="{ show: true }" x-show="show" x-transition
         x-init="setTimeout(() => show = false, 5000)">
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl shadow-lg flex items-center gap-3">
            <svg class="w-5 h-5 text-red-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-medium">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-warm-300 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="font-serif text-2xl font-bold text-white">Luxe<span class="text-primary-400">Furniture</span></span>
                    </div>
                    <p class="text-warm-400 leading-relaxed max-w-sm">
                        Menghadirkan furnitur premium berkualitas tinggi untuk mewujudkan rumah impian Anda. Dibuat dengan material terbaik dan desain yang timeless.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Produk</h4>
                    <ul class="space-y-2 text-warm-400">
                        <li><a href="{{ route('products.index', ['category' => 'chairs']) }}" class="hover:text-primary-400 transition">Kursi</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'tables']) }}" class="hover:text-primary-400 transition">Meja</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'sofas']) }}" class="hover:text-primary-400 transition">Sofa</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-primary-400 transition">Semua Produk</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2 text-warm-400 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@luxefurniture.id
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +62 21 1234 5678
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-primary-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Jl. Kemang Raya No. 45, Medan Kota
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-warm-800 mt-10 pt-6 flex flex-col md:flex-row items-center justify-between text-warm-500 text-sm">
                <p>&copy; {{ date('Y') }} LuxeFurniture. All rights reserved.</p>
                <p class="mt-2 md:mt-0">Dibuat Dengan Penuh Rasa Cinta</p>
            </div>
        </div>
    </footer>

</body>
</html>
