<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $member ? 'Edit Anggota Tim' : 'Tambah Anggota Tim' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi profil anggota tim di bawah ini.</p>
    </div>
    <a href="<?= base_url('admin/team') ?>" class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-primary-600 transition-colors">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>
</div>

<div class="max-w-4xl">
    <form action="<?= base_url('admin/team/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        <?php if ($member): ?>
            <input type="hidden" name="id" value="<?= $member->id ?>">
        <?php endif; ?>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="<?= old('name', $member->name ?? '') ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: Ahmad Fauzi">
                </div>

                <!-- Position -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="position" value="<?= old('position', $member->position ?? '') ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: Lead Developer">
                </div>

                <!-- Department -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Departemen</label>
                    <input type="text" name="department" value="<?= old('department', $member->department ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: Technology, Creative, Business">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Email Bisnis</label>
                    <input type="email" name="email" value="<?= old('email', $member->email ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="email@perusahaan.com">
                </div>

                <!-- Photo -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Foto Profil</label>
                    <div class="flex items-center space-x-6 mt-2">
                        <div class="shrink-0">
                            <?php if ($member && $member->photo): ?>
                                <img class="h-16 w-16 object-cover rounded-full ring-2 ring-slate-100" src="<?= base_url($member->photo) ?>" alt="Photo preview">
                            <?php else: ?>
                                <div class="h-16 w-16 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-200">
                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <label class="block">
                            <input type="file" name="photo" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-primary-50 file:text-primary-700
                                hover:file:bg-primary-100 transition-all
                            "/>
                        </label>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="<?= old('linkedin_url', $member->linkedin_url ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Instagram URL</label>
                    <input type="url" name="instagram_url" value="<?= old('instagram_url', $member->instagram_url ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Twitter URL</label>
                    <input type="url" name="twitter_url" value="<?= old('twitter_url', $member->twitter_url ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="<?= old('github_url', $member->github_url ?? '') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                </div>

                <!-- Skills -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Expertise / Skills (Pisahkan dengan koma)</label>
                    <?php 
                        $currentSkills = '';
                        if ($member && $member->skills) {
                            $skillsArray = is_string($member->skills) ? json_decode($member->skills, true) : $member->skills;
                            if (is_array($skillsArray)) {
                                $currentSkills = implode(', ', $skillsArray);
                            }
                        }
                    ?>
                    <input type="text" name="skills" value="<?= old('skills', $currentSkills) ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Contoh: PHP, Laravel, UI/UX, Leadership">
                </div>

                <!-- Bio -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Bio Singkat</label>
                    <textarea name="bio" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none"
                        placeholder="Ceritakan sedikit tentang anggota tim ini..."><?= old('bio', $member->bio ?? '') ?></textarea>
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="sort_order" value="<?= old('sort_order', $member->sort_order ?? '0') ?>"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Status</label>
                    <div class="flex items-center space-x-4 h-12">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" class="sr-only peer" <?= old('is_active', $member->is_active ?? '1') == '1' ? 'checked' : '' ?>>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            <span class="ml-3 text-sm font-medium text-slate-600">Aktif / Publikasikan</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <button type="reset" class="px-6 py-3 rounded-xl font-bold text-slate-600 hover:bg-slate-100 transition-all">
                Reset
            </button>
            <button type="submit" class="px-8 py-3 bg-primary-600 text-white rounded-xl font-bold hover:bg-primary-700 transition-all shadow-lg shadow-primary-200">
                <?= $member ? 'Simpan Perubahan' : 'Tambah Anggota' ?>
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
