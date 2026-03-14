<?php $__env->startSection('title', 'Pesanan Berhasil — Luxe Furniture'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    
    <div class="text-center mb-10 animate-slide-up">
        <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-5">
            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h1 class="font-serif text-4xl font-bold text-warm-900 mb-3">Pesanan Diterima!</h1>
        <p class="text-warm-500 text-lg">Terima kasih, <strong><?php echo e($order->name); ?></strong>. Pesanan Anda sedang diproses.</p>
        <div class="inline-block mt-4 bg-warm-100 px-5 py-2 rounded-full text-warm-700 font-mono font-bold text-lg tracking-wider">
            <?php echo e($order->invoice); ?>

        </div>
    </div>

    
    <div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden mb-6">
        <div class="p-6 border-b border-warm-100 bg-warm-50">
            <h2 class="font-serif text-lg font-bold text-warm-900">Detail Pesanan</h2>
        </div>

        
        <div class="divide-y divide-warm-50">
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex items-center gap-4 p-5">
                <?php if($item->product): ?>
                <img src="<?php echo e($item->product->image_url); ?>" alt="<?php echo e($item->product->title); ?>"
                     class="w-16 h-16 object-cover rounded-xl shrink-0">
                <div class="flex-1">
                    <p class="font-semibold text-warm-900"><?php echo e($item->product->title); ?></p>
                    <p class="text-sm text-warm-500"><?php echo e($item->product->category_label); ?> × <?php echo e($item->qty); ?></p>
                </div>
                <?php else: ?>
                <div class="w-16 h-16 bg-warm-100 rounded-xl flex items-center justify-center shrink-0">
                    <span class="text-2xl">📦</span>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-warm-500 italic">Produk tidak tersedia</p>
                </div>
                <?php endif; ?>
                <p class="font-bold text-warm-900 shrink-0"><?php echo e($item->formatted_subtotal); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="p-5 border-t border-warm-200 flex justify-between items-baseline bg-warm-50">
            <span class="font-bold text-warm-900">Total Pembayaran</span>
            <span class="text-2xl font-bold text-primary-700"><?php echo e($order->formatted_total); ?></span>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-2xl border border-warm-100 p-5 shadow-sm">
            <h3 class="font-serif font-bold text-warm-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Info Penerima
            </h3>
            <div class="space-y-2 text-sm text-warm-700">
                <div><span class="font-semibold">Nama:</span> <?php echo e($order->name); ?></div>
                <div><span class="font-semibold">Email:</span> <?php echo e($order->email); ?></div>
                <div><span class="font-semibold">Telepon:</span> <?php echo e($order->phone); ?></div>
                <div><span class="font-semibold">Alamat:</span> <?php echo e($order->address); ?></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-warm-100 p-5 shadow-sm">
            <h3 class="font-serif font-bold text-warm-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                Status Pembayaran
            </h3>
            <div class="space-y-2 text-sm text-warm-700">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">Batas Waktu:</span>
                    <span class="text-amber-600">Terbatas</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-semibold">Status:</span>
                    <span class="<?php echo e($order->status_badge); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                </div>
            </div>

            <?php if($order->status == 'pending'): ?>
            <button id="pay-button" class="btn-primary w-full mt-5">
                💳 Bayar Sekarang
            </button>
            <p class="text-xs text-warm-500 mt-2 text-center">Via Midtrans (Gopay, ShopeePay, Transfer Bank, dll)</p>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="text-center space-y-3 mt-8">
        <a href="<?php echo e(route('home')); ?>" class="btn-ghost mx-auto block w-fit">
            Kembali ke Beranda
        </a>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('services.midtrans.client_key')); ?>"></script>
<script type="text/javascript">
    document.getElementById('pay-button')?.addEventListener('click', function () {
        snap.pay('<?php echo e($order->snap_token); ?>', {
            onSuccess: function (result) {
                window.location.reload();
            },
            onPending: function (result) {
                window.location.reload();
            },
            onError: function (result) {
                alert('Terdapat kesalahan saat memproses pembayaran Anda.');
            },
            onClose: function () {
                console.log('User closed the popup without finishing the payment');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/checkout/success.blade.php ENDPATH**/ ?>