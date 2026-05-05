<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $portfolio ? 'Edit Portofolio' : 'Tambah Portofolio' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Detail pengerjaan project untuk ditampilkan di galeri.</p>
    </div>
    <a href="<?= base_url('admin/portfolios') ?>" class="inline-flex items-center text-slate-500 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>
</div>

<form action="<?= $portfolio ? base_url('admin/portfolios/update/'.$portfolio->id) : base_url('admin/portfolios/create') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Project <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="<?= old('title', $portfolio->title ?? '') ?>" required
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Terkait Layanan</label>
                        <select name="service_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                            <option value="">Pilih Layanan...</option>
                            <?php foreach($services as $s): ?>
                                <option value="<?= $s->id ?>" <?= old('service_id', $portfolio->service_id ?? '') == $s->id ? 'selected' : '' ?>><?= $s->title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Klien</label>
                        <input type="text" name="client_name" value="<?= old('client_name', $portfolio->client_name ?? '') ?>"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun Project</label>
                        <input type="number" name="project_year" value="<?= old('project_year', $portfolio->project_year ?? date('Y')) ?>"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Project URL (Opsional)</label>
                        <input type="url" name="project_url" value="<?= old('project_url', $portfolio->project_url ?? '') ?>"
                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                               placeholder="https://...">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="short_description" rows="2" required
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= old('short_description', $portfolio->short_description ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Konteks & Tantangan</label>
                    <textarea name="challenge" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= old('challenge', $portfolio->challenge ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Solusi & Implementasi</label>
                    <textarea name="solution" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= old('solution', $portfolio->solution ?? '') ?></textarea>
                </div>
            </div>

            <!-- Gallery Images -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4 mb-6">Galeri Project</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6" id="gallery-preview">
                    <?php if (isset($gallery)): ?>
                        <?php foreach($gallery as $img): ?>
                        <div class="relative group aspect-square rounded-xl overflow-hidden border border-slate-100" id="img-<?= $img->id ?>">
                            <img src="<?= $img->thumb_path ? base_url($img->thumb_path) : '' ?>" class="w-full h-full object-cover">
                            <button type="button" onclick="deleteGalleryImage(<?= $img->id ?>)" class="absolute top-2 right-2 p-1.5 bg-red-600 text-white rounded-lg opacity-0 group-hover:opacity-100 transition shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <label class="aspect-square rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center cursor-pointer hover:border-primary-300 hover:bg-primary-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-[10px] text-slate-400 mt-1 font-bold">Add Photo</span>
                        <input type="file" name="gallery[]" multiple onchange="handleGalleryUpload(this)" class="hidden">
                    </label>
                </div>
                <p class="text-xs text-slate-400 italic">Dapat memilih multiple file sekaligus.</p>
            </div>
        </div>

        <!-- Sidebar Options -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Pengaturan</h3>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700">Project Utama</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" class="sr-only peer" <?= old('is_featured', $portfolio->is_featured ?? 0) ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-primary-600 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan</label>
                    <input type="number" name="sort_order" value="<?= old('sort_order', $portfolio->sort_order ?? 0) ?>" class="w-full px-4 py-2.5 rounded-xl border border-slate-200">
                </div>
                <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                    Simpan Data
                </button>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Cover Project</h3>
                <div>
                    <div class="relative aspect-video rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition hover:border-primary-300">
                        <?php if (isset($portfolio->thumbnail) && $portfolio->thumbnail): ?>
                            <img src="<?= base_url($portfolio->thumbnail) ?>" id="preview" class="w-full h-full object-cover">
                        <?php else: ?>
                            <img src="" id="preview" class="hidden w-full h-full object-cover">
                            <svg id="placeholder" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        <?php endif; ?>
                        <input type="file" name="thumbnail" onchange="previewImage(this)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                const placeholder = document.getElementById('placeholder');
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if(placeholder) placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function deleteGalleryImage(id) {
        if (confirm('Hapus foto ini dari galeri?')) {
            try {
                const response = await fetch(`<?= base_url('admin/portfolios/delete-image') ?>/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
                    }
                });
                const result = await response.json();
                if (result.status === 'success') {
                    document.getElementById(`img-${id}`).remove();
                }
            } catch (error) {
                alert('Gagal menghapus foto.');
            }
        }
    }

    function handleGalleryUpload(input) {
        if (input.files.length > 0) {
            alert(input.files.length + ' file dipilih. Klik Simpan untuk upload.');
        }
    }
</script>

<?= $this->endSection() ?>
