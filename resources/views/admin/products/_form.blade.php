@php $product = $product ?? null; @endphp

<div x-data="{ previewUrl: '{{ $product?->image_url ?? '' }}' }">

    <div>
        <label class="form-label">Nama Produk</label>
        <input type="text" name="title" value="{{ old('title', $product?->title) }}" required
               class="form-input @error('title') border-red-400 @enderror"
               placeholder="Cth: Scandinavian Oak Armchair">
        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="form-label">Kategori</label>
            <select name="category" class="form-select @error('category') border-red-400 @enderror">
                <option value="">Pilih Kategori</option>
                <option value="chairs" @selected(old('category', $product?->category) === 'chairs')>🪑 Kursi</option>
                <option value="tables" @selected(old('category', $product?->category) === 'tables')>🪵 Meja</option>
                <option value="sofas" @selected(old('category', $product?->category) === 'sofas')>🛋️ Sofa</option>
                <option value="beds" @selected(old('category', $product?->category) === 'beds')>🛏️ Tempat Tidur</option>
            </select>
            @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="form-label">Stok</label>
            <input type="number" name="stock" min="0" value="{{ old('stock', $product?->stock ?? 10) }}"
                   class="form-input @error('stock') border-red-400 @enderror">
            @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="price" min="0" step="1000"
               value="{{ old('price', $product?->price) }}"
               class="form-input @error('price') border-red-400 @enderror"
               placeholder="1500000">
        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="4" required
                  class="form-input resize-none @error('description') border-red-400 @enderror"
                  placeholder="Deskripsikan produk secara detail...">{{ old('description', $product?->description) }}</textarea>
        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
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
               {{ old('is_featured', $product?->is_featured) ? 'checked' : '' }}
               class="w-4 h-4 rounded accent-primary-600">
        <label for="is_featured" class="text-warm-800 font-semibold text-sm cursor-pointer">
            ⭐ Tampilkan sebagai Produk Unggulan di halaman utama
        </label>
    </div>
</div>
