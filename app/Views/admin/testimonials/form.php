<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $testimonial ? 'Edit Testimoni' : 'Tambah Testimoni' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi data klien dan ulasan di bawah ini.</p>
    </div>
    <a href="<?= base_url('admin/testimonials') ?>" class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-primary-600 transition-colors">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>
</div>

<div class="max-w-4xl">
    <form action="<?= base_url('admin/testimonials/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        <?php if ($testimonial): ?>
            <input type="hidden" name="id" value="<?= $testimonial->id ?>">
        <?php endif; ?>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Client Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Klien <span class="text-red-500">*</span></label>
                    <input type="text" name="client_name" value="<?= old('client_name', $testimonial->client_name ?? '') ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: John Doe">
                </div>

                <!-- Position -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jabatan</label>
                    <input type="text" name="client_position" value="<?= old('client_position', $testimonial->client_position ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: CEO">
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Perusahaan</label>
                    <input type="text" name="client_company" value="<?= old('client_company', $testimonial->client_company ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: Tech Corp">
                </div>

                <!-- Avatar -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Foto Klien (Avatar)</label>
                    <div class="flex items-center space-x-6 mt-2">
                        <div class="shrink-0">
                            <?php if ($testimonial && $testimonial->client_photo): ?>
                                <img class="h-16 w-16 object-cover rounded-full ring-2 ring-slate-100" src="<?= base_url($testimonial->client_photo) ?>" alt="Avatar preview">
                            <?php else: ?>
                                <div class="h-16 w-16 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-200">
                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" name="client_photo" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-primary-50 file:text-primary-700
                                hover:file:bg-primary-100 transition-all
                            "/>
                        </label>
                    </div>
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Rating <span class="text-red-500">*</span></label>
                    <select name="rating" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                        <?php for($i=5; $i>=1; $i--): ?>
                            <option value="<?= $i ?>" <?= old('rating', $testimonial->rating ?? '5') == $i ? 'selected' : '' ?>><?= $i ?> Bintang</option>
                        <?php endfor; ?>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Status</label>
                    <div class="flex items-center space-x-4 h-12">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" class="sr-only peer" <?= old('is_active', $testimonial->is_active ?? '1') == '1' ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            <span class="ml-3 text-sm font-medium text-slate-600">Aktif / Publikasikan</span>
                        </label>
                    </div>
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Testimoni / Ulasan <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="4" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Tulis ulasan klien di sini..."><?= old('content', $testimonial->content ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <button type="reset" class="px-6 py-3 rounded-xl font-bold text-slate-600 hover:bg-slate-100 transition-all">
                Reset
            </button>
            <button type="submit" class="px-8 py-3 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-700 transition-all shadow-lg shadow-primary-200">
                <?= $testimonial ? 'Simpan Perubahan' : 'Tambah Testimoni' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
