

<?php $__env->startSection('title', 'Checkout — Luxe Furniture'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <h1 class="section-title mb-2">Checkout</h1>
    <p class="section-subtitle mb-10">Lengkapi informasi pengiriman dan pilih metode pembayaran</p>

    <form action="<?php echo e(route('checkout.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            
            <div class="lg:col-span-2 space-y-6">

                
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 flex items-center gap-2">
                        <span class="w-7 h-7 bg-primary-600 text-white text-sm rounded-full flex items-center justify-center font-sans font-bold">1</span>
                        Informasi Penerima
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required
                                   placeholder="Nama sesuai identitas"
                                   class="form-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required
                                   placeholder="email@contoh.com"
                                   class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="form-label" for="phone">Nomor Telepon</label>
                            <input id="phone" type="text" name="phone" value="<?php echo e(old('phone')); ?>" required
                                   placeholder="08xxxxxxxxxx"
                                   class="form-input <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="md:col-span-2">
                            <label class="form-label" for="address">Alamat Lengkap</label>
                            <textarea id="address" name="address" rows="3" required
                                      placeholder="Jl. Nama Jalan No. XX, Kelurahan, Kecamatan, Kota, Kode Pos"
                                      class="form-input resize-none <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('address')); ?></textarea>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="md:col-span-2">
                            <label class="form-label" for="notes">Catatan (opsional)</label>
                            <textarea id="notes" name="notes" rows="2"
                                      placeholder="Instruksi khusus pengiriman..."
                                      class="form-input resize-none"><?php echo e(old('notes')); ?></textarea>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm"
                     x-data="{ selected: '<?php echo e(old('payment_method', 'bank_transfer')); ?>' }">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 flex items-center gap-2">
                        <span class="w-7 h-7 bg-primary-600 text-white text-sm rounded-full flex items-center justify-center font-sans font-bold">2</span>
                        Metode Pembayaran
                    </h2>
                    <input type="hidden" name="payment_method" :value="selected">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <label @click="selected = 'bank_transfer'"
                               :class="selected === 'bank_transfer' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="text-3xl">🏦</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">Bank Transfer</div>
                                <div class="text-xs text-warm-500">BCA, BNI, Mandiri, BRI</div>
                            </div>
                            <div :class="selected === 'bank_transfer' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'bank_transfer'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        
                        <label @click="selected = 'ovo'"
                               :class="selected === 'ovo' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white font-black text-sm">OVO</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">OVO</div>
                                <div class="text-xs text-warm-500">E-Wallet OVO</div>
                            </div>
                            <div :class="selected === 'ovo' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'ovo'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        
                        <label @click="selected = 'dana'"
                               :class="selected === 'dana' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white font-black text-sm">DANA</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">Dana</div>
                                <div class="text-xs text-warm-500">E-Wallet Dana</div>
                            </div>
                            <div :class="selected === 'dana' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'dana'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>

                        
                        <label @click="selected = 'qris'"
                               :class="selected === 'qris' ? 'border-primary-500 bg-primary-50 ring-2 ring-primary-400/30' : 'border-warm-200 hover:border-primary-300'"
                               class="flex items-center gap-4 p-4 rounded-xl border-2 cursor-pointer transition-all duration-200">
                            <div class="text-3xl">📱</div>
                            <div class="flex-1">
                                <div class="font-bold text-warm-900">QRIS</div>
                                <div class="text-xs text-warm-500">Scan kode QR</div>
                            </div>
                            <div :class="selected === 'qris' ? 'bg-primary-600 border-primary-600' : 'border-warm-300'"
                                 class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-all">
                                <div x-show="selected === 'qris'" class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </label>
                    </div>

                    
                    <div class="mt-4 p-3 bg-amber-50 border border-amber-200 rounded-xl text-amber-800 text-sm flex gap-2">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Instruksi pembayaran akan dikirim ke email setelah pesanan dikonfirmasi. Status pembayaran: <strong>Pending</strong>.
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-white rounded-2xl border border-warm-100 p-6 shadow-sm sticky top-24">
                    <h2 class="font-serif text-xl font-bold text-warm-900 mb-5 pb-4 border-b border-warm-100">
                        Pesanan Anda
                    </h2>

                    <div class="space-y-4 max-h-72 overflow-y-auto pr-1">
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex gap-3 items-center">
                            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['title']); ?>"
                                 class="w-14 h-14 object-cover rounded-xl shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-warm-900 line-clamp-2 leading-snug"><?php echo e($item['title']); ?></p>
                                <p class="text-xs text-warm-500 mt-0.5">× <?php echo e($item['qty']); ?></p>
                            </div>
                            <p class="text-sm font-bold text-warm-900 shrink-0">
                                Rp <?php echo e(number_format($item['price'] * $item['qty'], 0, ',', '.')); ?>

                            </p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="border-t border-warm-100 mt-5 pt-4 space-y-2 text-sm text-warm-600">
                        <div class="flex justify-between">
                            <span>Subtotal (<?php echo e(count($cart)); ?> item)</span>
                            <span class="font-semibold">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                        </div>
                        <div class="flex justify-between text-emerald-600">
                            <span>Ongkir</span>
                            <span class="font-semibold">Gratis!</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-warm-200 flex justify-between items-baseline">
                        <span class="text-warm-900 font-bold text-base">Total Pembayaran</span>
                        <span class="text-2xl font-bold text-primary-700">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                    </div>

                    <button type="submit" class="btn-primary w-full mt-6 py-4 text-base">
                        🔒 Konfirmasi Pesanan
                    </button>
                    <p class="text-xs text-center text-warm-400 mt-3">
                        Data Anda aman & terenkripsi
                    </p>
                </div>
            </div>

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ecommerce-furniture\resources\views/checkout/index.blade.php ENDPATH**/ ?>