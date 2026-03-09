<?php $__env->startSection('title', 'Detail Pesanan ' . $order->invoice); ?>
<?php $__env->startSection('page_title', 'Detail Pesanan'); ?>
<?php $__env->startSection('page_subtitle', 'Invoice: ' . $order->invoice); ?>

<?php $__env->startSection('content'); ?>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 max-w-5xl">

    
    <div class="xl:col-span-2 space-y-4">
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-warm-100">
                <h2 class="font-serif font-bold text-warm-900">Item Pesanan</h2>
            </div>
            <div class="divide-y divide-warm-50">
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center gap-4 p-5">
                    <?php if($item->product): ?>
                    <img src="<?php echo e($item->product->image_url); ?>" alt="<?php echo e($item->product->title); ?>"
                         class="w-16 h-16 object-cover rounded-xl shrink-0">
                    <div class="flex-1">
                        <p class="font-semibold text-warm-900"><?php echo e($item->product->title); ?></p>
                        <p class="text-warm-500 text-sm"><?php echo e($item->product->category_label); ?></p>
                        <p class="text-warm-500 text-sm">Harga satuan: Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></p>
                    </div>
                    <?php else: ?>
                    <div class="w-16 h-16 bg-warm-100 rounded-xl shrink-0 flex items-center justify-center">📦</div>
                    <div class="flex-1">
                        <p class="font-semibold text-warm-400 italic">Produk telah dihapus</p>
                    </div>
                    <?php endif; ?>
                    <div class="text-right shrink-0">
                        <p class="font-bold text-warm-900"><?php echo e($item->formatted_subtotal); ?></p>
                        <p class="text-warm-400 text-xs mt-0.5">× <?php echo e($item->qty); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="px-6 py-4 border-t border-warm-200 bg-warm-50 flex justify-between items-baseline">
                <span class="font-bold text-warm-900">Total</span>
                <span class="text-xl font-bold text-primary-700"><?php echo e($order->formatted_total); ?></span>
            </div>
        </div>
    </div>

    
    <div class="space-y-5">
        
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4 pb-3 border-b border-warm-100">Info Pelanggan</h3>
            <div class="space-y-2 text-sm">
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Nama</span><span class="text-warm-900"><?php echo e($order->name); ?></span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Email</span><span class="text-warm-900 break-all"><?php echo e($order->email); ?></span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Telepon</span><span class="text-warm-900"><?php echo e($order->phone); ?></span></div>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Alamat</span><span class="text-warm-900"><?php echo e($order->address); ?></span></div>
                <?php if($order->notes): ?>
                <div class="flex gap-2"><span class="font-semibold text-warm-500 w-16 shrink-0">Catatan</span><span class="text-warm-700 italic"><?php echo e($order->notes); ?></span></div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4 pb-3 border-b border-warm-100">Info Pembayaran</h3>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-warm-500">Metode</span>
                    <span class="font-semibold text-warm-900"><?php echo e($order->payment_method_label); ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-warm-500">Status Saat Ini</span>
                    <span class="<?php echo e($order->status_badge); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-warm-500">Tanggal Pesan</span>
                    <span class="font-semibold text-warm-900"><?php echo e($order->created_at->format('d M Y, H:i')); ?></span>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl border border-warm-100 shadow-sm p-5">
            <h3 class="font-serif font-bold text-warm-900 mb-4">Ubah Status Pesanan</h3>
            <form action="<?php echo e(route('admin.orders.updateStatus', $order)); ?>" method="POST" class="space-y-3">
                <?php echo csrf_field(); ?>
                <select name="status" class="form-select">
                    <option value="pending" <?php if($order->status === 'pending'): echo 'selected'; endif; ?>>⏳ Pending</option>
                    <option value="success" <?php if($order->status === 'success'): echo 'selected'; endif; ?>>✅ Success</option>
                    <option value="cancelled" <?php if($order->status === 'cancelled'): echo 'selected'; endif; ?>>❌ Cancelled</option>
                </select>
                <button type="submit" class="btn-primary w-full">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Status
                </button>
            </form>
        </div>

        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn-ghost w-full justify-center text-sm">
            ← Kembali ke Daftar Pesanan
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>