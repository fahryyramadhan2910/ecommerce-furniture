<?php $__env->startSection('title', 'Keranjang Belanja — Luxe Furniture'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <h1 class="section-title mb-10">Keranjang Belanja</h1>

    <?php if(empty($cart)): ?>
    
    <div class="text-center py-24">
        <div class="text-8xl mb-6">🛒</div>
        <h2 class="font-serif text-3xl font-bold text-warm-700 mb-3">Keranjang Kosong</h2>
        <p class="text-warm-500 mb-8">Belum ada produk yang ditambahkan. Mulai belanja sekarang!</p>
        <a href="<?php echo e(route('products.index')); ?>" class="btn-primary">
            Mulai Belanja
        </a>
    </div>
    <?php else: ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        
        <div class="lg:col-span-2 space-y-4">
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl border border-warm-100 p-5 flex gap-5 items-center shadow-sm hover:shadow-md transition">
                
                <a href="<?php echo e(route('products.show', $item['slug'])); ?>" class="shrink-0">
                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?>"
                         class="w-24 h-24 object-cover rounded-xl">
                </a>

                
                <div class="flex-1 min-w-0">
                    <a href="<?php echo e(route('products.show', $item['slug'])); ?>">
                        <h3 class="font-serif font-semibold text-warm-900 hover:text-primary-600 transition line-clamp-1">
                            <?php echo e($item['title']); ?>

                        </h3>
                    </a>
                    <p class="text-primary-700 font-bold mt-1">
                        Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?>

                    </p>

                    
                    <form action="<?php echo e(route('cart.update', $item['id'])); ?>" method="POST"
                          class="flex items-center gap-3 mt-3">
                        <?php echo csrf_field(); ?>
                        <div class="flex items-center border border-warm-200 rounded-xl overflow-hidden bg-warm-50">
                            <button type="button"
                                    onclick="this.nextElementSibling.stepDown(); this.form.submit();"
                                    class="w-8 h-8 text-warm-600 hover:bg-warm-200 transition font-bold flex items-center justify-center">−</button>
                            <input type="number" name="qty" value="<?php echo e($item['qty']); ?>" min="1"
                                   class="w-10 text-center bg-transparent text-sm font-semibold text-warm-900 outline-none">
                            <button type="button"
                                    onclick="this.previousElementSibling.stepUp(); this.form.submit();"
                                    class="w-8 h-8 text-warm-600 hover:bg-warm-200 transition font-bold flex items-center justify-center">+</button>
                        </div>
                        <button type="submit" class="text-xs text-primary-600 font-semibold hover:underline">Update</button>
                    </form>
                </div>

                
                <div class="text-right shrink-0">
                    <p class="font-bold text-warm-900">
                        Rp <?php echo e(number_format($item['price'] * $item['qty'], 0, ',', '.')); ?>

                    </p>
                    <form action="<?php echo e(route('cart.remove', $item['id'])); ?>" method="POST" class="mt-2">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                                class="text-xs text-red-500 hover:text-red-700 font-semibold flex items-center gap-1 ml-auto transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm sticky top-24">
                <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 pb-4 border-b border-warm-100">
                    Ringkasan Pesanan
                </h2>
                <div class="space-y-3 mb-5">
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex justify-between text-sm text-warm-600">
                        <span class="line-clamp-1 flex-1"><?php echo e($item['title']); ?> × <?php echo e($item['qty']); ?></span>
                        <span class="font-semibold ml-3 shrink-0">Rp <?php echo e(number_format($item['price'] * $item['qty'], 0, ',', '.')); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="border-t border-warm-100 pt-4 space-y-2 text-sm text-warm-600">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span class="font-semibold">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                    </div>
                    <div class="flex justify-between text-emerald-600">
                        <span>Ongkos Kirim</span>
                        <span class="font-semibold">Gratis</span>
                    </div>
                </div>

                <div class="border-t border-warm-200 mt-4 pt-4 flex justify-between items-baseline">
                    <span class="font-bold text-warm-900">Total</span>
                    <span class="text-2xl font-bold text-primary-700">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                </div>

                <a href="<?php echo e(route('checkout.index')); ?>" class="btn-primary w-full mt-6 py-4 text-base">
                    Lanjut ke Checkout
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>

                <a href="<?php echo e(route('products.index')); ?>" class="btn-ghost w-full mt-3 py-3 text-sm justify-center">
                    ← Lanjut Belanja
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/cart/index.blade.php ENDPATH**/ ?>