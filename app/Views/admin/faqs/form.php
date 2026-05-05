<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $faq ? 'Edit FAQ' : 'Tambah FAQ' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi informasi pertanyaan dan jawaban di bawah ini.</p>
    </div>
    <a href="<?= base_url('admin/faqs') ?>" class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-primary-600 transition-colors">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>
</div>

<div class="max-w-4xl">
    <form action="<?= base_url('admin/faqs/store') ?>" method="POST" class="space-y-6">
        <?= csrf_field() ?>
        <?php if ($faq): ?>
            <input type="hidden" name="id" value="<?= $faq->id ?>">
        <?php endif; ?>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
            <div class="grid grid-cols-1 gap-6">
                <!-- Question -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <input type="text" name="question" value="<?= old('question', $faq->question ?? '') ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: Berapa lama waktu pengerjaan website?">
                </div>

                <!-- Answer -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jawaban <span class="text-red-500">*</span></label>
                    <textarea name="answer" rows="6" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Berikan jawaban lengkap dan jelas..."><?= old('answer', $faq->answer ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Sort Order -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="sort_order" value="<?= old('sort_order', $faq->sort_order ?? '0') ?>"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                        <p class="text-xs text-slate-400 mt-1">Angka lebih kecil tampil lebih awal.</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Status</label>
                        <div class="flex items-center space-x-4 h-12">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" <?= old('is_active', $faq->is_active ?? '1') == '1' ? 'checked' : '' ?>>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                <span class="ml-3 text-sm font-medium text-slate-600">Aktif / Publikasikan</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <button type="reset" class="px-6 py-3 rounded-xl font-bold text-slate-600 hover:bg-slate-100 transition-all">
                Reset
            </button>
            <button type="submit" class="px-8 py-3 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-700 transition-all shadow-lg shadow-primary-200">
                <?= $faq ? 'Simpan Perubahan' : 'Tambah FAQ' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
