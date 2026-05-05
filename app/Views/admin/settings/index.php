<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8">
    <h2 class="text-2xl font-bold text-slate-900">Pengaturan Website</h2>
    <p class="text-slate-500 text-sm mt-1">Konfigurasi identitas, kontak, dan fitur operasional website.</p>
</div>

<div x-data="{ activeTab: '<?= $groups[0] ?? 'general' ?>' }" class="grid grid-cols-1 lg:grid-cols-4 gap-8">
    <!-- Tabs Sidebar -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden p-2 space-y-1">
            <?php foreach($groups as $group): ?>
            <button @click="activeTab = '<?= $group ?>'" 
                    :class="activeTab === '<?= $group ?>' ? 'bg-primary-50 text-primary-600' : 'text-slate-500 hover:bg-slate-50'"
                    class="w-full text-left px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest transition">
                <?= $group ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Settings Forms -->
    <div class="lg:col-span-3">
        <form action="<?= base_url('admin/settings/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <?php foreach($groups as $group): ?>
                <div x-show="activeTab === '<?= $group ?>'" x-cloak class="p-8 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-50 pb-4 mb-8">
                        <h3 class="text-lg font-bold text-slate-900 capitalize">Setelan <?= $group ?></h3>
                        <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-bold uppercase rounded-lg"><?= count(array_filter($settings, fn($s) => $s->group_name === $group)) ?> Item</span>
                    </div>
                    
                    <div class="space-y-6">
                        <?php foreach($settings as $s): ?>
                            <?php if($s->group_name === $group): ?>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label class="text-sm font-semibold text-slate-700 md:pt-2">
                                    <?= $s->label ?>
                                    <span class="block text-[10px] font-mono text-slate-400 mt-0.5"><?= $s->setting_key ?></span>
                                </label>
                                <div class="md:col-span-2">
                                    <?php if($s->setting_type === 'textarea'): ?>
                                        <textarea name="settings[<?= $s->setting_key ?>]" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"><?= $s->setting_value ?></textarea>
                                    <?php elseif($s->setting_type === 'boolean'): ?>
                                        <label class="relative inline-flex items-center cursor-pointer pt-2">
                                            <input type="hidden" name="settings[<?= $s->setting_key ?>]" value="0">
                                            <input type="checkbox" name="settings[<?= $s->setting_key ?>]" value="1" class="sr-only peer" <?= $s->setting_value == '1' ? 'checked' : '' ?>>
                                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                        </label>
                                    <?php elseif($s->setting_type === 'number'): ?>
                                        <input type="number" name="settings[<?= $s->setting_key ?>]" value="<?= $s->setting_value ?>" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                                    <?php elseif($s->setting_type === 'image'): ?>
                                        <div class="flex items-start space-x-4">
                                            <?php if ($s->setting_value): ?>
                                                <div class="h-16 w-16 rounded-lg overflow-hidden border border-slate-100 flex-shrink-0">
                                                    <img src="<?= base_url($s->setting_value) ?>" class="w-full h-full object-cover">
                                                </div>
                                            <?php endif; ?>
                                            <div class="flex-1">
                                                <input type="file" name="settings[<?= $s->setting_key ?>]" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition">
                                                <p class="text-[10px] text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                                            </div>
                                        </div>
                                    <?php elseif($s->setting_type === 'color'): ?>
                                        <div class="flex items-center space-x-3">
                                            <input type="color" name="settings[<?= $s->setting_key ?>]" value="<?= $s->setting_value ?: '#000000' ?>" class="h-10 w-10 rounded-lg border border-slate-200 cursor-pointer">
                                            <input type="text" value="<?= $s->setting_value ?>" readonly class="flex-1 px-4 py-2 rounded-xl bg-slate-50 border border-slate-100 text-sm font-mono text-slate-500">
                                        </div>
                                    <?php else: ?>
                                        <input type="text" name="settings[<?= $s->setting_key ?>]" value="<?= $s->setting_value ?>" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="p-8 bg-slate-50 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-primary-600 text-white font-bold px-10 py-3.5 rounded-2xl hover:bg-primary-700 transition shadow-xl shadow-primary-200">
                        Simpan Semua Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
