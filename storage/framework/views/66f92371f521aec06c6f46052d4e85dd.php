<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Luxe Furniture</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen bg-dark flex items-center justify-center p-4" x-data>

    <div class="w-full max-w-md">
        
        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl shadow-primary-900/40">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <h1 class="font-serif text-3xl font-bold text-white">LuxeFurniture</h1>
            <p class="text-warm-400 mt-1">Administrator Panel</p>
        </div>

        
        <div class="bg-dark-lighter rounded-2xl border border-white/10 p-8 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-6 text-center">Masuk ke Panel Admin</h2>

            <?php if($errors->any()): ?>
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 text-sm px-4 py-3 rounded-xl mb-5">
                <?php echo e($errors->first()); ?>

            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="bg-amber-500/10 border border-amber-500/30 text-amber-400 text-sm px-4 py-3 rounded-xl mb-5">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.login.post')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block text-warm-400 text-sm font-semibold mb-1.5">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                           placeholder="admin@furniture.com"
                           class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-warm-600
                                  focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                </div>
                <div>
                    <label class="block text-warm-400 text-sm font-semibold mb-1.5">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" required
                               placeholder="••••••••"
                               class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-warm-600
                                      focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition pr-12">
                        <button type="button" @click="show = !show"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-warm-500 hover:text-warm-300 transition">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded accent-primary-600">
                    <label for="remember" class="text-warm-400 text-sm">Ingat saya</label>
                </div>
                <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-200 shadow-lg shadow-primary-900/30 active:scale-[0.98]">
                    Masuk sebagai Admin
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-white/10 text-center text-xs text-warm-600">
                <span class="bg-dark px-3 py-1 rounded-full border border-white/5">
                    Demo: admin@furniture.com / password
                </span>
            </div>
        </div>

        <p class="text-center text-warm-600 text-sm mt-6">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-primary-400 transition">← Kembali ke website</a>
        </p>
    </div>
</body>
</html>
<?php /**PATH D:\ecommerce-furnitur\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>