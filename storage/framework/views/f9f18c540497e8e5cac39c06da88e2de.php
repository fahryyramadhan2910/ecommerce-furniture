<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page_title', 'Dashboard'); ?>
<?php $__env->startSection('page_subtitle', 'Ringkasan aktivitas toko Anda'); ?>

<?php $__env->startSection('content'); ?>


<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    <?php $__currentLoopData = [
        ['label' => 'Total Produk', 'value' => $totalProducts, 'icon' => '📦', 'color' => 'bg-blue-50 text-blue-600', 'link' => route('admin.products.index')],
        ['label' => 'Total Pesanan', 'value' => $totalOrders, 'icon' => '📋', 'color' => 'bg-warm-100 text-warm-700', 'link' => route('admin.orders.index')],
        ['label' => 'Pendapatan (Success)', 'value' => 'Rp ' . number_format($totalRevenue, 0, ',', '.'), 'icon' => '💰', 'color' => 'bg-emerald-50 text-emerald-600', 'link' => route('admin.orders.index', ['status' => 'success'])],
        ['label' => 'Pesanan Pending', 'value' => $pendingOrders, 'icon' => '⏳', 'color' => 'bg-amber-50 text-amber-600', 'link' => route('admin.orders.index', ['status' => 'pending'])],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e($stat['link']); ?>"
       class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 block">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 <?php echo e($stat['color']); ?> rounded-2xl flex items-center justify-center text-2xl">
                <?php echo e($stat['icon']); ?>

            </div>
            <svg class="w-4 h-4 text-warm-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </div>
        <p class="text-warm-500 text-sm font-medium"><?php echo e($stat['label']); ?></p>
        <p class="text-warm-900 text-2xl font-bold font-serif mt-1"><?php echo e($stat['value']); ?></p>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    
    <div class="xl:col-span-2 bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-warm-100 flex items-center justify-between">
            <h2 class="font-serif font-bold text-warm-900">Pesanan Terbaru</h2>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-primary-600 text-sm font-semibold hover:underline">Lihat semua →</a>
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
                    <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-warm-50 transition">
                        <td class="px-6 py-4">
                            <a href="<?php echo e(route('admin.orders.show', $order)); ?>"
                               class="font-mono text-primary-600 font-semibold hover:underline">
                                <?php echo e($order->invoice); ?>

                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-warm-900"><?php echo e($order->name); ?></p>
                            <p class="text-warm-400 text-xs"><?php echo e($order->email); ?></p>
                        </td>
                        <td class="px-6 py-4 font-semibold text-warm-900"><?php echo e($order->formatted_total); ?></td>
                        <td class="px-6 py-4">
                            <span class="<?php echo e($order->status_badge); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-warm-400">Belum ada pesanan masuk.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-warm-100">
            <h2 class="font-serif font-bold text-warm-900">⚠️ Stok Hampir Habis</h2>
        </div>
        <div class="p-4 space-y-3 max-h-80 overflow-y-auto">
            <?php $__empty_1 = true; $__currentLoopData = $lowStock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center gap-3 p-3 rounded-xl bg-warm-50 hover:bg-warm-100 transition">
                <img src="<?php echo e($p->image_url); ?>" alt="<?php echo e($p->title); ?>"
                     class="w-10 h-10 object-cover rounded-lg shrink-0">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-warm-900 line-clamp-1"><?php echo e($p->title); ?></p>
                    <p class="text-xs text-red-500 font-semibold">Sisa <?php echo e($p->stock); ?> unit</p>
                </div>
                <a href="<?php echo e(route('admin.products.edit', $p)); ?>" class="text-primary-600 hover:text-primary-800 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-8 text-warm-400">
                <p class="text-3xl mb-2">✅</p>
                <p class="text-sm">Semua stok aman</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="px-4 pb-4">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn-ghost w-full justify-center text-sm">Kelola Produk →</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>