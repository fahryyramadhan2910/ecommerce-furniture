<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?> — Luxe Furniture</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-warm-100 font-sans" x-data>

    <div class="flex h-screen overflow-hidden">

        
        <aside class="w-64 bg-dark flex flex-col shrink-0 shadow-2xl" x-data="{ open: true }">
            
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-primary-600 rounded-xl flex items-center justify-center shadow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-serif font-bold text-white text-base leading-tight">LuxeFurniture</p>
                        <p class="text-warm-500 text-xs">Admin Panel</p>
                    </div>
                </div>
            </div>

            
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <p class="text-warm-600 text-xs font-bold uppercase tracking-widest px-4 mb-3">Menu</p>

                <a href="<?php echo e(route('admin.dashboard')); ?>"
                   class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="<?php echo e(route('admin.products.index')); ?>"
                   class="sidebar-link <?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Produk
                </a>

                <a href="<?php echo e(route('admin.orders.index')); ?>"
                   class="sidebar-link <?php echo e(request()->routeIs('admin.orders.*') ? 'active' : ''); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Pesanan
                    <?php $pendingCount = \App\Models\Order::where('status','pending')->count(); ?>
                    <?php if($pendingCount > 0): ?>
                    <span class="ml-auto bg-amber-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">
                        <?php echo e($pendingCount); ?>

                    </span>
                    <?php endif; ?>
                </a>

                <div class="pt-4 border-t border-white/10 mt-4">
                    <a href="<?php echo e(route('home')); ?>" target="_blank"
                       class="sidebar-link text-warm-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Lihat Website
                    </a>
                </div>
            </nav>

            
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 mb-3">
                    <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0">
                        <?php echo e(substr(Auth::guard('admin')->user()->name, 0, 1)); ?>

                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-sm font-semibold truncate"><?php echo e(Auth::guard('admin')->user()->name); ?></p>
                        <p class="text-warm-500 text-xs truncate"><?php echo e(Auth::guard('admin')->user()->email); ?></p>
                    </div>
                </div>
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                            class="sidebar-link w-full text-red-400 hover:bg-red-500/10 hover:text-red-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        
        <div class="flex-1 flex flex-col overflow-hidden">

            
            <header class="bg-white border-b border-warm-200 px-8 py-4 flex items-center justify-between shadow-sm shrink-0">
                <div>
                    <h1 class="text-xl font-serif font-bold text-warm-900"><?php echo $__env->yieldContent('page_title', 'Dashboard'); ?></h1>
                    <p class="text-warm-500 text-sm"><?php echo $__env->yieldContent('page_subtitle', 'Selamat datang kembali!'); ?></p>
                </div>
                <div class="flex items-center gap-3">
                    <?php if(session('success')): ?>
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-3 py-2 rounded-xl text-sm font-medium flex items-center gap-2"
                         x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                        <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                    <span class="text-warm-400 text-sm"><?php echo e(now()->isoFormat('dddd, D MMMM Y')); ?></span>
                </div>
            </header>

            
            <main class="flex-1 overflow-y-auto p-8">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

</body>
</html>
<?php /**PATH D:\ecommerce-furnitur\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>