<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $service ? 'Edit Layanan' : 'Tambah Layanan' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi detail informasi layanan di bawah ini.</p>
    </div>
    <a href="<?= base_url('admin/services') ?>" class="inline-flex items-center text-slate-500 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>
</div>

<form action="<?= $service ? base_url('admin/services/update/'.$service->id) : base_url('admin/services/create') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Layanan <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="<?= old('title', $service->title ?? '') ?>" required
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="Contoh: Pembuatan Aplikasi Mobile">
                    <?php if(isset(session('errors')['title'])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= session('errors')['title'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Slug URL <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" id="slug" value="<?= old('slug', $service->slug ?? '') ?>" required
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="otomatis-dari-nama-layanan">
                    <?php if(isset(session('errors')['slug'])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= session('errors')['slug'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="short_description" rows="3" required
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                              placeholder="Penjelasan singkat yang tampil di kartu layanan..."><?= old('short_description', $service->short_description ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Lengkap</label>
                    <textarea name="full_description" rows="8"
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                              placeholder="Detail layanan, keunggulan, dll..."><?= old('full_description', $service->full_description ?? '') ?></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Mulai (Rp)</label>
                        <input type="number" name="price_start" value="<?= old('price_start', $service->price_start ?? '0') ?>"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="sort_order" value="<?= old('sort_order', $service->sort_order ?? '0') ?>"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Pengaturan SEO</h3>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="<?= old('meta_title', $service->meta_title ?? '') ?>"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="Title tag untuk mesin pencari">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                              placeholder="Deskripsi singkat untuk hasil pencarian Google"><?= old('meta_description', $service->meta_description ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar Options -->
        <div class="space-y-6">
            <!-- Publishing -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Publikasi</h3>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700">Aktifkan Layanan</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" <?= old('is_active', $service->is_active ?? 1) ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700">Tampilkan di Beranda</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" class="sr-only peer" <?= old('is_featured', $service->is_featured ?? 0) ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                    </label>
                </div>
                <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                    Simpan Perubahan
                </button>
            </div>

            <!-- Media -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Media</h3>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-4">Thumbnail / Icon</label>
                    <div class="relative group">
                        <div class="w-full aspect-square rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition group-hover:border-primary-300">
                            <?php if (isset($service->thumbnail) && $service->thumbnail): ?>
                                <img src="<?= base_url($service->thumbnail) ?>" id="preview" class="w-full h-full object-cover">
                            <?php else: ?>
                                <img src="" id="preview" class="hidden w-full h-full object-cover">
                                <svg id="placeholder" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p id="placeholder-text" class="text-xs text-slate-400 mt-2 font-medium">Klik untuk upload gambar</p>
                            <?php endif; ?>
                        </div>
                        <input type="file" name="thumbnail" onchange="previewImage(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <p class="text-[10px] text-slate-400 mt-3 text-center">Rekomendasi: 800x800px (1:1), Max 2MB.</p>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Icon SVG Code</label>
                    <textarea name="icon_svg" rows="4" class="w-full px-3 py-2 text-xs font-mono rounded-lg border border-slate-200 bg-slate-50 outline-none" placeholder='<svg ...></svg>'><?= old('icon_svg', $service->icon_svg ?? '') ?></textarea>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Auto-slug generation
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');

    title.addEventListener('keyup', function() {
        const text = title.value.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        slug.value = text;
    });

    // Image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder');
                const pText = document.getElementById('placeholder-text');
                
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if(placeholder) placeholder.classList.add('hidden');
                if(pText) pText.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection() ?>
