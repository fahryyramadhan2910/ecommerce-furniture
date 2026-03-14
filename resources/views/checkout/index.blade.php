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

                <!-- Payment details will be handled via Midtrans -->

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
