<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Pengelola Sistem (Admin)</h2>
        <p class="text-slate-500 text-sm mt-1">Kelola akun yang memiliki akses ke dashboard ini.</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="<?= base_url('admin/settings/users/new') ?>" class="inline-flex items-center px-4 py-2 bg-slate-900 text-white font-semibold rounded-lg hover:bg-slate-800 transition shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Tambah Admin
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Nama</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Email</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Role</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach($users as $user): ?>
                <tr class="hover:bg-slate-50/50 transition" id="row-<?= $user->id ?>">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($user->name) ?>&background=0e8ce9&color=fff" class="h-8 w-8 rounded-full mr-3">
                            <span class="font-bold text-slate-900"><?= $user->name ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">
                        <?= $user->email ?>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider <?= $user->role === 'superadmin' ? 'bg-purple-50 text-purple-600' : 'bg-blue-50 text-blue-600' ?>">
                            <?= $user->role ?>
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $user->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' ?>">
                            <?= $user->is_active ? 'Aktif' : 'Non-aktif' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="<?= base_url('admin/settings/users/edit/'.$user->id) ?>" class="inline-flex p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <button onclick="confirmDelete(<?= $user->id ?>)" class="inline-flex p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    async function confirmDelete(id) {
        if (confirm('Hapus akun admin ini?')) {
            try {
                const response = await fetch(`<?= base_url('admin/settings/users/delete') ?>/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
                    }
                });
                const result = await response.json();
                if (result.status === 'success') {
                    document.getElementById(`row-${id}`).remove();
                    alert(result.message);
                } else {
                    alert(result.message);
                }
            } catch (error) {
                alert('Gagal menghapus data.');
            }
        }
    }
</script>

<?= $this->endSection() ?>
