<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $product ? 'Edit Produk' : 'Tambah Produk' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi informasi produk untuk katalog toko Anda.</p>
    </div>
    <a href="<?= base_url('admin/shop/products') ?>" class="inline-flex items-center text-slate-500 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>
</div>

<form action="<?= $product ? base_url('admin/shop/products/update/'.$product->id) : base_url('admin/shop/products/create') ?>" method="POST" enctype="multipart/form-data" class="flex flex-wrap -mx-4">
    <?= csrf_field() ?>
    
    <!-- Left Column: Main Info -->
    <div class="w-full lg:w-8/12 px-4 space-y-6">
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Produk</label>
                <input type="text" name="name" value="<?= old('name', $product->name ?? '') ?>" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                       placeholder="Contoh: Lisensi Software Enterprise">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Produk</label>
                <textarea name="description" rows="10" required
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= old('description', $product->description ?? '') ?></textarea>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h4 class="font-bold text-slate-900 mb-6">Optimasi SEO</h4>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="<?= old('meta_title', $product->meta_title ?? '') ?>"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= old('meta_description', $product->meta_description ?? '') ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Sidebar -->
    <div class="w-full lg:w-4/12 px-4 space-y-6 mt-8 lg:mt-0">
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
            <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3.5 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                Simpan Produk
            </button>
            
            <div class="pt-6 border-t border-slate-50">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" <?= old('is_active', $product->is_active ?? 1) ? 'checked' : '' ?> class="h-5 w-5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    <span class="text-sm font-bold text-slate-700">Publikasikan Produk</span>
                </label>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
            <h4 class="font-bold text-slate-900 mb-4">Harga & Stok</h4>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Normal (Rp)</label>
                <input type="number" name="price" value="<?= old('price', $product->price ?? '') ?>" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Promo (Rp) - Optional</label>
                <input type="number" name="price_before" value="<?= old('price_before', $product->price_before ?? '') ?>"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Stok Tersedia</label>
                <input type="number" name="stock_qty" value="<?= old('stock_qty', $product->stock_qty ?? 0) ?>" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-4">
            <h4 class="font-bold text-slate-900 mb-4">Thumbnail</h4>
            <?php if($product && $product->thumbnail): ?>
                <img src="<?= base_url($product->thumbnail) ?>" class="w-full rounded-xl mb-4">
            <?php endif; ?>
            <input type="file" name="thumbnail" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition">
        </div>
    </div>
</form>

<?= $this->endSection() ?>
