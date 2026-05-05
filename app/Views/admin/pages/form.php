<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $page ? 'Edit Halaman' : 'Tambah Halaman' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Gunakan editor di bawah ini untuk menyusun konten halaman.</p>
    </div>
    <a href="<?= base_url('admin/pages') ?>" class="text-sm font-semibold text-slate-600 hover:text-primary-600 flex items-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

<form action="<?= $page ? base_url('admin/pages/update/'.$page->id) : base_url('admin/pages/create') ?>" method="POST" class="max-w-5xl">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Halaman <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="<?= old('title', $page->title ?? '') ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition shadow-sm"
                           placeholder="Contoh: Tentang Kami">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Konten <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="20" required
                              class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition shadow-sm font-mono text-sm"
                              placeholder="Tulis konten halaman di sini (mendukung HTML)..."><?= old('content', $page->content ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Sidebar / Meta -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Slug (URL)</label>
                    <input type="text" name="slug" value="<?= old('slug', $page->slug ?? '') ?>"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-500 text-sm outline-none transition"
                           placeholder="otomatis-dari-judul">
                    <p class="text-[10px] text-slate-400 mt-2">Biarkan kosong untuk generate otomatis.</p>
                </div>

                <hr class="border-slate-50">

                <button type="submit" class="w-full py-4 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                    <?= $page ? 'Simpan Perubahan' : 'Terbitkan Halaman' ?>
                </button>
                
                <button type="reset" class="w-full py-3 text-slate-400 font-semibold hover:text-slate-600 transition">
                    Reset Form
                </button>
            </div>

            <div class="bg-primary-50 p-6 rounded-2xl border border-primary-100">
                <h4 class="font-bold text-primary-900 mb-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tips Editor
                </h4>
                <p class="text-xs text-primary-700 leading-relaxed">
                    Konten mendukung elemen HTML standar. Anda bisa menggunakan <code>&lt;div&gt;</code> dengan class Tailwind untuk desain yang lebih kompleks.
                </p>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
