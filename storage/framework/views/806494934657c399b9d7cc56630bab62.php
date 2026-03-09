<?php $__env->startSection('title', 'Manajemen Pesanan'); ?>
<?php $__env->startSection('page_title', 'Manajemen Pesanan'); ?>
<?php $__env->startSection('page_subtitle', 'Kelola semua pesanan masuk dari pelanggan'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">
    <form action="<?php echo e(route('admin.orders.index')); ?>" method="GET" class="flex gap-3 flex-1 max-w-xl">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
               placeholder="Cari invoice, nama, email..."
               class="form-input flex-1">
        <select name="status" class="form-select w-40">
            <option value="">Semua Status</option>
            <option value="pending" <?php if(request('status') === 'pending'): echo 'selected'; endif; ?>>⏳ Pending</option>
            <option value="success" <?php if(request('status') === 'success'): echo 'selected'; endif; ?>>✅ Success</option>
            <option value="cancelled" <?php if(request('status') === 'cancelled'): echo 'selected'; endif; ?>>❌ Cancelled</option>
        </select>
        <button type="submit" class="btn-primary px-4">Filter</button>
    </form>
</div>


<div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-warm-50 border-b border-warm-100">
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Invoice</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Pelanggan</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Item</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Total</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Pembayaran</th>
                    <th class="text-center px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Status</th>
                    <th class="text-right px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-warm-50">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-warm-50 transition" x-data="{ open: false }">
                    <td class="px-6 py-4">
                        <a href="<?php echo e(route('admin.orders.show', $order)); ?>"
                           class="font-mono text-primary-600 font-semibold hover:underline text-xs">
                            <?php echo e($order->invoice); ?>

                        </a>
                        <p class="text-warm-400 text-xs mt-0.5"><?php echo e($order->created_at->format('d M Y, H:i')); ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-semibold text-warm-900"><?php echo e($order->name); ?></p>
                        <p class="text-warm-400 text-xs"><?php echo e($order->email); ?></p>
                        <p class="text-warm-400 text-xs"><?php echo e($order->phone); ?></p>
                    </td>
                    <td class="px-6 py-4 text-warm-700"><?php echo e($order->items->count()); ?> item</td>
                    <td class="px-6 py-4 font-bold text-warm-900"><?php echo e($order->formatted_total); ?></td>
                    <td class="px-6 py-4 text-warm-600 text-xs"><?php echo e($order->payment_method_label); ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="<?php echo e($order->status_badge); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?php echo e(route('admin.orders.show', $order)); ?>"
                               class="w-8 h-8 bg-warm-100 hover:bg-primary-100 text-warm-600 hover:text-primary-700 rounded-lg flex items-center justify-center transition"
                               title="Lihat Detail">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>

                            
                            <form action="<?php echo e(route('admin.orders.updateStatus', $order)); ?>" method="POST" class="flex gap-1">
                                <?php echo csrf_field(); ?>
                                <select name="status"
                                        onchange="if(confirm('Ubah status pesanan ini?')) this.form.submit();"
                                        class="text-xs px-2 py-1.5 rounded-lg border border-warm-200 bg-white text-warm-700 focus:ring-1 focus:ring-primary-400 outline-none">
                                    <option value="pending" <?php if($order->status === 'pending'): echo 'selected'; endif; ?>>⏳ Pending</option>
                                    <option value="success" <?php if($order->status === 'success'): echo 'selected'; endif; ?>>✅ Success</option>
                                    <option value="cancelled" <?php if($order->status === 'cancelled'): echo 'selected'; endif; ?>>❌ Cancelled</option>
                                </select>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="px-6 py-16 text-center">
                        <div class="text-5xl mb-3">📋</div>
                        <p class="text-warm-500 font-medium">Belum ada pesanan masuk.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-warm-100">
        <?php echo e($orders->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>