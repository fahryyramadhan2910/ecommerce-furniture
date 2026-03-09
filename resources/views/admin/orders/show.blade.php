@extends('admin.layouts.app')

@section('title', 'Detail Pesanan ' . $order->invoice)
@section('page_title', 'Detail Pesanan')
@section('page_subtitle', 'Invoice: ' . $order->invoice)

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 max-w-5xl">

    {{-- Order Items --}}
    <div class="xl:col-span-2 space-y-4">
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-warm-100">
                <h2 class="font-serif font-bold text-warm-900">Item Pesanan</h2>
            </div>
            <div class="divide-y divide-warm-50">
                @foreach($order->items as $item)
                <div class="flex items-center gap-4 p-5">
                    @if($item->product)
                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->title }}"
                         class="w-16 h-16 object-cover rounded-xl shrink-0">
                    <div class="flex-1">
                        <p class="font-semibold text-warm-900">{{ $item->product->title }}</p>
                        <p class="text-warm-500 text-sm">{{ $item->product->category_label }}</p>
                        <p class="text-warm-500 text-sm">Harga satuan: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-warm-100 rounded-xl shrink-0 flex items-center justify-center">📦</div>
                    <div class="flex-1">
                        <p class="font-semibold text-warm-400 italic">Produk telah dihapus</p>
                    </div>
                    @endif
                    <div class="text-right shrink-0">
                        <p class="font-bold text-warm-900">{{ $item->formatted_subtotal }}</p>
                        <p class="text-warm-400 text-xs mt-0.5">× {{ $item->qty }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="px-6 py-4 border-t border-warm-200 bg-warm-50 flex justify-between items-baseline">
                <span class="font-bold text-warm-900">Total</span>
                <span class="text-xl font-bold text-primary-700">{{ $order->formatted_total }}</span>
            </div>
        </div>
    </div>

    {{-- Right: Info + Status --}}
    <div class="space-y-5">
        {{-- Customer Info --}}
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4 pb-3 border-b border-warm-100">Info Pelanggan</h3>
            <div class="space-y-2 text-sm">
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Nama</span><span class="text-warm-900">{{ $order->name }}</span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Email</span><span class="text-warm-900 break-all">{{ $order->email }}</span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Telepon</span><span class="text-warm-900">{{ $order->phone }}</span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Alamat</span><span class="text-warm-900">{{ $order->address }}</span></div>
                @if($order->notes)
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Catatan</span><span class="text-warm-700 italic">{{ $order->notes }}</span></div>
                @endif
            </div>
        </div>

        {{-- Payment Info --}}
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4 pb-3 border-b border-warm-100">Info Pembayaran</h3>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-warm-500">Metode</span>
                    <span class="font-semibold text-warm-900">{{ $order->payment_method_label }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-warm-500">Status Saat Ini</span>
                    <span class="{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-warm-500">Tanggal Pesan</span>
                    <span class="font-semibold text-warm-900">{{ $order->created_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>

        {{-- Update Status --}}
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4">Ubah Status Pesanan</h3>
            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="space-y-3">
                @csrf
                <select name="status" class="form-select">
                    <option value="pending" @selected($order->status === 'pending')>⏳ Pending</option>
                    <option value="success" @selected($order->status === 'success')>✅ Success</option>
                    <option value="cancelled" @selected($order->status === 'cancelled')>❌ Cancelled</option>
                </select>
                <button type="submit" class="btn-primary w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Status
                </button>
            </form>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn-ghost w-full justify-center text-sm">
            ← Kembali ke Daftar Pesanan
        </a>
    </div>
</div>
@endsection
