<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900"><?= $user ? 'Edit Admin' : 'Tambah Admin' ?></h2>
        <p class="text-slate-500 text-sm mt-1">Atur profil dan hak akses pengguna dashboard.</p>
    </div>
    <a href="<?= base_url('admin/settings/users') ?>" class="inline-flex items-center text-slate-500 hover:text-slate-900 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali
    </a>
</div>

<div class="max-w-2xl">
    <form action="<?= $user ? base_url('admin/settings/users/update/'.$user->id) : base_url('admin/settings/users/create') ?>" method="POST" class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
        <?= csrf_field() ?>
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="<?= old('name', $user->name ?? '') ?>" required
                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Email Login</label>
            <input type="email" name="email" value="<?= old('email', $user->email ?? '') ?>" required
                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Password <?= $user ? '(Kosongkan jika tidak diubah)' : '' ?></label>
            <input type="password" name="password" <?= $user ? '' : 'required' ?>
                   class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Role Akses</label>
                <select name="role" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    <option value="admin" <?= old('role', $user->role ?? '') == 'admin' ? 'selected' : '' ?>>Admin (Editor)</option>
                    <option value="superadmin" <?= old('role', $user->role ?? '') == 'superadmin' ? 'selected' : '' ?>>Superadmin (Full Access)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Status Akun</label>
                <select name="is_active" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                    <option value="1" <?= old('is_active', $user->is_active ?? 1) == 1 ? 'selected' : '' ?>>Aktif</option>
                    <option value="0" <?= old('is_active', $user->is_active ?? 1) == 0 ? 'selected' : '' ?>>Non-aktif</option>
                </select>
            </div>
        </div>

        <button type="submit" class="w-full bg-primary-600 text-white font-bold py-3.5 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200">
            Simpan Data Admin
        </button>
    </form>
</div>

<?= $this->endSection() ?>
