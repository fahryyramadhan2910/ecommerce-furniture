<?php $product = $product ?? null; ?>

<div x-data="{ previewUrl: '<?php echo e($product?->image_url ?? ''); ?>' }">

    <div>
        <label class="form-label">Nama Produk</label>
        <input type="text" name="title" value="<?php echo e(old('title', $product?->title)); ?>" required
               class="form-input <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               placeholder="Cth: Scandinavian Oak Armchair">
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="form-label">Kategori</label>
            <select name="category" class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <option value="">Pilih Kategori</option>
                <option value="chairs" <?php if(old('category', $product?->category) === 'chairs'): echo 'selected'; endif; ?>>🪑 Kursi</option>
                <option value="tables" <?php if(old('category', $product?->category) === 'tables'): echo 'selected'; endif; ?>>🪵 Meja</option>
                <option value="sofas" <?php if(old('category', $product?->category) === 'sofas'): echo 'selected'; endif; ?>>🛋️ Sofa</option>
                <option value="beds" <?php if(old('category', $product?->category) === 'beds'): echo 'selected'; endif; ?>>🛏️ Tempat Tidur</option>
            </select>
            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label class="form-label">Stok</label>
            <input type="number" name="stock" min="0" value="<?php echo e(old('stock', $product?->stock ?? 10)); ?>"
                   class="form-input <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div>
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="price" min="0" step="1000"
               value="<?php echo e(old('price', $product?->price)); ?>"
               class="form-input <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               placeholder="1500000">
        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="4" required
                  class="form-input resize-none <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                  placeholder="Deskripsikan produk secara detail..."><?php echo e(old('description', $product?->description)); ?></textarea>
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
        <label class="form-label">Gambar Produk</label>
        <div class="flex gap-4 items-start">
            <div x-show="previewUrl" class="shrink-0">
                <img :src="previewUrl" alt="Preview" class="w-24 h-24 object-cover rounded-xl border border-warm-200">
            </div>
            <div class="flex-1">
                <input type="file" name="image" accept="image/*" id="imageInput"
                       @change="previewUrl = URL.createObjectURL($event.target.files[0])"
                       class="block w-full text-sm text-warm-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-primary-50 file:text-primary-700 file:font-semibold hover:file:bg-primary-100 transition cursor-pointer">
                <p class="text-warm-400 text-xs mt-1">JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-3 p-4 bg-warm-50 rounded-xl border border-warm-200">
        <input type="checkbox" id="is_featured" name="is_featured" value="1"
               <?php echo e(old('is_featured', $product?->is_featured) ? 'checked' : ''); ?>

               class="w-4 h-4 rounded accent-primary-600">
        <label for="is_featured" class="text-warm-800 font-semibold text-sm cursor-pointer">
            ⭐ Tampilkan sebagai Produk Unggulan di halaman utama
        </label>
    </div>
</div>
<?php /**PATH D:\ecommerce-furnitur\resources\views/admin/products/_form.blade.php ENDPATH**/ ?>