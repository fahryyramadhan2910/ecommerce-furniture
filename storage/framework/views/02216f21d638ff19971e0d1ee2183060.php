

<?php $__env->startSection('title', 'Manajemen Produk'); ?>
<?php $__env->startSection('page_title', 'Manajemen Produk'); ?>
<?php $__env->startSection('page_subtitle', 'Kelola semua produk furnitur toko Anda'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <form action="<?php echo e(route('admin.products.index')); ?>" method="GET" class="flex gap-3 flex-1 max-w-lg">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
               placeholder="Cari produk..."
               class="form-input flex-1">
        <select name="category" class="form-select w-36">
            <option value="">Semua Kategori</option>
            <option value="chairs" <?php if(request('category') === 'chairs'): echo 'selected'; endif; ?>>Kursi</option>
            <option value="tables" <?php if(request('category') === 'tables'): echo 'selected'; endif; ?>>Meja</option>
            <option value="sofas" <?php if(request('category') === 'sofas'): echo 'selected'; endif; ?>>Sofa</option>
            <option value="beds" <?php if(request('category') === 'beds'): echo 'selected'; endif; ?>>Tempat Tidur</option>
        </select>
        <button type="submit" class="btn-primary px-4 py-2.5">Filter</button>
    </form>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Produk
    </a>
</div>


<div class="bg-white rounded-2xl border border-warm-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-warm-50 border-b border-warm-100">
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Produk</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                    <th class="text-left px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Harga</th>
                    <th class="text-center px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Stok</th>
                    <th class="text-center px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Unggulan</th>
                    <th class="text-right px-6 py-3 text-warm-600 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-warm-50">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-warm-50 transition" id="product-row-<?php echo e($product->id); ?>">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->title); ?>"
                                 class="w-12 h-12 object-cover rounded-xl shrink-0">
                            <div>
                                <p class="font-semibold text-warm-900"><?php echo e($product->title); ?></p>
                                <p class="text-warm-400 text-xs line-clamp-1 max-w-xs"><?php echo e(Str::limit($product->description, 60)); ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="badge-pending"><?php echo e($product->category_label); ?></span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-warm-900"><?php echo e($product->formatted_price); ?></td>
                    <td class="px-6 py-4 text-center">
                        <?php if($product->stock < 5): ?>
                            <span class="badge-cancelled"><?php echo e($product->stock); ?></span>
                        <?php elseif($product->stock < 10): ?>
                            <span class="badge-pending"><?php echo e($product->stock); ?></span>
                        <?php else: ?>
                            <span class="badge-success"><?php echo e($product->stock); ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?php if($product->is_featured): ?>
                            <span class="text-amber-500">⭐</span>
                        <?php else: ?>
                            <span class="text-warm-300">—</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                               class="w-8 h-8 bg-warm-100 hover:bg-primary-100 text-warm-600 hover:text-primary-700 rounded-lg flex items-center justify-center transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="w-8 h-8 bg-warm-100 hover:bg-red-100 text-warm-600 hover:text-red-700 rounded-lg flex items-center justify-center transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="text-4xl mb-3">📦</div>
                        <p class="text-warm-500 font-medium">Belum ada produk.</p>
                        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary mt-4 inline-flex">Tambah Produk Pertama</a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-warm-100">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/admin/products/index.blade.php ENDPATH**/ ?>