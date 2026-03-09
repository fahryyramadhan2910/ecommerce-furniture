<?php $__env->startSection('title', 'Luxe Furniture — Premium Home Furniture'); ?>
<?php $__env->startSection('meta_description', 'Koleksi furnitur premium pilihan untuk rumah impian Anda. Kualitas terbaik, desain elegan, harga terjangkau.'); ?>

<?php $__env->startSection('content'); ?>


<section class="relative min-h-[92vh] flex items-center overflow-hidden bg-warm-900">
    
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1618220179428-22790b461013?w=1600&q=80"
             alt="Luxe Furniture Hero"
             class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-dark/90 via-dark/60 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="max-w-2xl animate-slide-up">
            <span class="inline-block text-primary-400 text-sm font-semibold tracking-widest uppercase mb-4 border border-primary-500/40 px-3 py-1 rounded-full">
                ✦ Koleksi Premium 2025
            </span>
            <h1 class="font-serif text-5xl md:text-7xl font-bold text-white leading-tight mb-6">
                Rumah yang<br>
                <span class="text-gradient bg-gradient-to-r from-primary-300 to-primary-500 bg-clip-text text-transparent">
                    Bercerita
                </span>
            </h1>
            <p class="text-warm-300 text-lg md:text-xl leading-relaxed mb-10">
                Temukan furnitur yang lebih dari sekadar fungsional — sebuah karya seni yang mengubah setiap sudut rumah Anda menjadi pengalaman estetika yang tak terlupakan.
            </p>
            <div class="flex flex-wrap items-center gap-4">
                <a href="<?php echo e(route('products.index')); ?>" class="btn-primary text-base px-8 py-4 shadow-lg shadow-primary-900/30">
                    Jelajahi Koleksi
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#featured" class="btn-secondary text-base px-8 py-4 border-white/30 text-white hover:bg-white/10">
                    Lihat Unggulan
                </a>
            </div>

            
            <div class="flex flex-wrap gap-8 mt-14 pt-10 border-t border-white/10">
                <div>
                    <div class="text-3xl font-bold text-white font-serif">500+</div>
                    <div class="text-warm-400 text-sm mt-1">Produk Pilihan</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-white font-serif">10K+</div>
                    <div class="text-warm-400 text-sm mt-1">Pelanggan Puas</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-white font-serif">5★</div>
                    <div class="text-warm-400 text-sm mt-1">Rating Rata-rata</div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-warm-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>


<section class="bg-white border-b border-warm-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-center gap-3">
            <span class="text-warm-500 font-medium mr-2">Kategori:</span>
            <a href="<?php echo e(route('products.index')); ?>"
               class="px-5 py-2 rounded-full border-2 border-warm-200 text-warm-700 font-semibold hover:border-primary-500 hover:text-primary-600 transition-all duration-200">
                Semua
            </a>
            <?php $__currentLoopData = ['chairs' => '🪑 Kursi', 'tables' => '🪵 Meja', 'sofas' => '🛋️ Sofa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.index', ['category' => $key])); ?>"
               class="px-5 py-2 rounded-full border-2 border-warm-200 text-warm-700 font-semibold hover:border-primary-500 hover:text-primary-600 transition-all duration-200">
                <?php echo e($label); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section id="featured" class="py-20 bg-warm-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-primary-600 text-sm font-semibold tracking-widest uppercase">Unggulan</span>
            <h2 class="section-title mt-2">Produk Pilihan Kami</h2>
            <p class="section-subtitle">Didesain untuk keindahan, dibuat untuk bertahan lama</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-product group">
                <a href="<?php echo e(route('products.show', $product->slug)); ?>">
                    <div class="relative overflow-hidden h-56">
                        <img src="<?php echo e($product->image_url); ?>"
                             alt="<?php echo e($product->title); ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span class="bg-primary-600 text-white text-xs font-bold px-2.5 py-1 rounded-full">Unggulan</span>
                        </div>
                    </div>
                </a>
                <div class="p-5">
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider"><?php echo e($product->category_label); ?></span>
                    <a href="<?php echo e(route('products.show', $product->slug)); ?>">
                        <h3 class="font-serif font-semibold text-warm-900 mt-1 mb-2 hover:text-primary-600 transition line-clamp-2">
                            <?php echo e($product->title); ?>

                        </h3>
                    </a>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-primary-700 font-bold text-lg"><?php echo e($product->formatted_price); ?></span>
                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit"
                                    class="w-9 h-9 bg-primary-600 text-white rounded-xl flex items-center justify-center hover:bg-primary-700 active:scale-95 transition-all shadow">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('products.index')); ?>" class="btn-secondary">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="section-title">Koleksi Berdasarkan Kategori</h2>
            <p class="section-subtitle">Setiap kategori dikurasi dari pengrajin terbaik</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = [
                ['label' => 'Kursi', 'key' => 'chairs', 'icon' => '🪑', 'img' => 'https://images.unsplash.com/photo-1679079456783-5d862f755557?w=800&q=80', 'desc' => 'Koleksi kursi ergonomis & dekoratif'],
                ['label' => 'Meja', 'key' => 'tables', 'icon' => '🪵', 'img' => 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=800&q=80', 'desc' => 'Meja makan, kerja & kopi premium'],
                ['label' => 'Sofa', 'key' => 'sofas', 'icon' => '🛋️', 'img' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&q=80', 'desc' => 'Sofa mewah untuk ruang tamu Anda'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.index', ['category' => $cat['key']])); ?>"
               class="group relative overflow-hidden rounded-2xl shadow-lg aspect-[4/5] block">
                <img src="<?php echo e($cat['img']); ?>" alt="<?php echo e($cat['label']); ?>"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <div class="text-3xl mb-2"><?php echo e($cat['icon']); ?></div>
                    <h3 class="text-white font-serif text-2xl font-bold"><?php echo e($cat['label']); ?></h3>
                    <p class="text-warm-300 text-sm mt-1"><?php echo e($cat['desc']); ?></p>
                    <div class="mt-4 inline-flex items-center gap-2 text-primary-300 font-semibold text-sm group-hover:gap-4 transition-all">
                        Lihat Koleksi
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="py-20 bg-warm-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="font-serif text-4xl font-bold">Mengapa Memilih LuxeFurniture?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = [
                ['icon' => '🪵', 'title' => 'Material Premium', 'desc' => 'Setiap produk dibuat dari kayu solid pilihan, kain berkualitas tinggi, dan bahan ramah lingkungan.'],
                ['icon' => '🚚', 'title' => 'Gratis Ongkos Kirim', 'desc' => 'Nikmati pengiriman gratis ke seluruh Indonesia untuk setiap pembelian di atas Rp 500.000.'],
                ['icon' => '🛡️', 'title' => 'Garansi 2 Tahun', 'desc' => 'Setiap produk dilindungi garansi penuh 2 tahun untuk ketenangan pikiran Anda.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center p-8 rounded-2xl bg-white/5 hover:bg-white/10 transition border border-white/10">
                <div class="text-5xl mb-5"><?php echo e($feature['icon']); ?></div>
                <h3 class="font-serif text-xl font-bold mb-3"><?php echo e($feature['title']); ?></h3>
                <p class="text-warm-400 leading-relaxed"><?php echo e($feature['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ecommerce-furnitur\resources\views/home/index.blade.php ENDPATH**/ ?>