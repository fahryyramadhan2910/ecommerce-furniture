@extends('layouts.app')

@section('title', 'Checkout — Luxe Furniture')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <h1 class="section-title mb-2">Checkout</h1>
    <p class="section-subtitle mb-10">Lengkapi informasi pengiriman dan pilih metode pembayaran</p>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Customer Info + Payment --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Customer Info Card --}}
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 flex items-center gap-2">
                        <span class="w-7 h-7 bg-primary-600 text-white text-sm rounded-full flex items-center justify-center font-sans font-bold">1</span>
                        Informasi Penerima
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                   placeholder="Nama sesuai identitas"
                                   class="form-input @error('name') border-red-400 @enderror">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   placeholder="email@contoh.com"
                                   class="form-input @error('email') border-red-400 @enderror">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="form-label" for="phone">Nomor Telepon</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required
                                   placeholder="08xxxxxxxxxx"
                                   class="form-input @error('phone') border-red-400 @enderror">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="form-label" for="address">Alamat Lengkap</label>
                            <textarea id="address" name="address" rows="3" required
                                      placeholder="Jl. Nama Jalan No. XX, Kelurahan, Kecamatan, Kota, Kode Pos"
                                      class="form-input resize-none @error('address') border-red-400 @enderror">{{ old('address') }}</textarea>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="form-label" for="notes">Catatan (opsional)</label>
                            <textarea id="notes" name="notes" rows="2"
                                      placeholder="Instruksi khusus pengiriman..."
                                      class="form-input resize-none">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Payment Method Card --}}
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm"
                     x-data="{ selected: '{{ old('payment_method', 'bank_transfer') }}' }">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 flex items-center gap-2">
                        <span class="w-7 h-7 bg-primary-600 text-white text-sm rounded-full flex items-center justify-center font-sans font-bold">2</span>
                        Metode Pembayaran
                    </h2>
                    <input type="hidden" name="payment_method" :value="selected">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Bank Transfer --}}
                        <label @click="selected = 'bank_transfer'"
                               :class="selected === 'bank_transfer' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="text-3xl">🏦</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">Bank Transfer</div>
                                <div class="text-xs text-warm-500">BCA, BNI, Mandiri, BRI</div>
                            </div>
                            <div :class="selected === 'bank_transfer' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'bank_transfer'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        {{-- OVO --}}
                        <label @click="selected = 'ovo'"
                               :class="selected === 'ovo' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white font-black text-sm">OVO</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">OVO</div>
                                <div class="text-xs text-warm-500">E-Wallet OVO</div>
                            </div>
                            <div :class="selected === 'ovo' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'ovo'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        {{-- Dana --}}
                        <label @click="selected = 'dana'"
                               :class="selected === 'dana' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white font-black text-sm">DANA</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">Dana</div>
                                <div class="text-xs text-warm-500">E-Wallet Dana</div>
                            </div>
                            <div :class="selected === 'dana' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'dana'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        {{-- QRIS --}}
                        <label @click="selected = 'qris'"
                               :class="selected === 'qris' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="text-3xl">📱</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">QRIS</div>
                                <div class="text-xs text-warm-500">Scan kode QR</div>
                            </div>
                            <div :class="selected === 'qris' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'qris'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>
                    </div>

                    {{-- Payment info note --}}
                    <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-xl text-amber-800 text-sm flex gap-2">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Instruksi pembayaran akan dikirim ke email setelah pesanan dikonfirmasi. Status pembayaran: <strong>Pending</strong>.
                    </div>
                </div>
            </div>

            {{-- Right: Order Summary --}}
            <div>
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm sticky top-24">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 pb-4 border-b border-warm-100">
                        Pesanan Anda
                    </h2>

                    <div class="space-y-4 max-h-72 overflow-y-auto pr-1">
                        @foreach($cart as $item)
                        <div class="flex gap-3 items-center">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                 class="w-14 h-14 object-cover rounded-xl shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-warm-900 line-clamp-2 leading-snug">{{ $item['title'] }}</p>
                                <p class="text-xs text-warm-500 mt-0.5">× {{ $item['qty'] }}</p>
                            </div>
                            <p class="text-sm font-bold text-warm-900 shrink-0">
                                Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                            </p>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-warm-100 mt-5 pt-4 space-y-2 text-sm text-warm-600">
                        <div class="flex justify-between">
                            <span>Subtotal ({{ count($cart) }} item)</span>
                            <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-emerald-600">
                            <span>Ongkir</span>
                            <span class="font-semibold">Gratis!</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-warm-200 flex justify-between items-baseline">
                        <span class="text-warm-900 font-bold text-base">Total Pembayaran</span>
                        <span class="text-2xl font-bold text-primary-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <button type="submit" class="btn-primary w-full mt-6 py-4 text-base">
                        🔒 Konfirmasi Pesanan
                    </button>
                    <p class="text-xs text-center text-warm-400 mt-3">
                        Data Anda aman & terenkripsi
                    </p>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
