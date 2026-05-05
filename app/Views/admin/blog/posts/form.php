<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $post ? 'Edit Artikel' : 'Tulis Artikel Baru' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Gunakan konten yang menarik untuk meningkatkan SEO dan trust klien.</p>
    </div>
    <a href="<?= base_url('admin/blog/posts') ?>" class="inline-flex items-center text-slate-500 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>
</div>

<form action="<?= $post ? base_url('admin/blog/posts/update/'.$post->id) : base_url('admin/blog/posts/create') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Editor Area -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="<?= old('title', $post->title ?? '') ?>" required
                           class="w-full px-4 py-3 text-lg font-bold rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="Judul artikel yang menarik...">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ringkasan Singkat (Summary)</label>
                    <textarea name="summary" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition" placeholder="Potongan kalimat untuk daftar artikel..."><?= old('summary', $post->summary ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Konten Artikel <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="20" required id="editor"
                              class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition font-sans"
                              placeholder="Mulai menulis konten di sini..."><?= old('content', $post->content ?? '') ?></textarea>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Optimasi SEO</h3>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="<?= old('meta_title', $post->meta_title ?? '') ?>"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none transition focus:border-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none transition focus:border-primary-500"><?= old('meta_description', $post->meta_description ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar Options -->
        <div class="space-y-6">
            <!-- Publishing -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Status & Kategori</h3>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                    <select name="category_id" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none transition focus:border-primary-500">
                        <option value="">Pilih Kategori...</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat->id ?>" <?= old('category_id', $post->category_id ?? '') == $cat->id ? 'selected' : '' ?>><?= $cat->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Publikasi</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none transition focus:border-primary-500">
                        <option value="draft" <?= old('status', $post->status ?? '') == 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="published" <?= old('status', $post->status ?? '') == 'published' ? 'selected' : '' ?>>Published</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-slate-700">Tampilkan di Beranda</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" class="sr-only peer" <?= old('is_featured', $post->is_featured ?? 0) ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-checked:bg-primary-600 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </div>

                <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                    Simpan Artikel
                </button>
            </div>

            <!-- Image -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h3 class="font-bold text-slate-900 border-b border-slate-50 pb-4">Cover Artikel</h3>
                <div>
                    <div class="relative aspect-[16/9] rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden transition hover:border-primary-300">
                        <?php if (isset($post->thumbnail) && $post->thumbnail): ?>
                            <img src="<?= base_url($post->thumbnail) ?>" id="preview" class="w-full h-full object-cover">
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
            
            <!-- URL Slug -->
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">URL SLUG</label>
                <input type="text" name="slug" id="slug" value="<?= old('slug', $post->slug ?? '') ?>" class="w-full px-3 py-2 text-xs font-mono rounded bg-slate-50 border-none outline-none focus:ring-1 focus:ring-primary-200">
            </div>
        </div>
    </div>
</form>

<script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');

    title.addEventListener('keyup', function() {
        const text = title.value.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        slug.value = text;
    });

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
</script>

<?= $this->endSection() ?>
