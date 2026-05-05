<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Kategori Blog</h2>
        <p class="text-slate-500 text-sm mt-1">Organisir artikel Anda berdasarkan topik.</p>
    </div>
</div>

<div class="flex flex-wrap -mx-4">
    <!-- Form Add -->
    <div class="w-full lg:w-4/12 px-4 mb-8 lg:mb-0">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-6">Tambah Kategori</h3>
            <form action="<?= base_url('admin/blog/categories/create') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Slug (Optional)</label>
                    <input type="text" name="slug" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 outline-none transition">
                </div>
                <button type="submit" class="w-full bg-slate-900 text-white font-bold py-2.5 rounded-xl hover:bg-slate-800 transition">Simpan Kategori</button>
            </form>
        </div>
    </div>

    <!-- List Categories -->
    <div class="w-full lg:w-8/12 px-4">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach($categories as $cat): ?>
                    <tr class="hover:bg-slate-50/50 transition" id="row-<?= $cat->id ?>">
                        <td class="px-6 py-4 font-bold text-slate-900"><?= $cat->name ?></td>
                        <td class="px-6 py-4 text-slate-500 text-sm"><?= $cat->slug ?></td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="deleteCategory(<?= $cat->id ?>)" class="text-slate-400 hover:text-red-600 transition">
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
</div>

<script>
    async function deleteCategory(id) {
        if (confirm('Hapus kategori ini?')) {
            const response = await fetch(`<?= base_url('admin/blog/categories/delete') ?>/${id}`, {
                method: 'DELETE',
                headers: { 'X-Requested-With': 'XMLHttpRequest', '<?= csrf_header() ?>': '<?= csrf_hash() ?>' }
            });
            if (response.ok) document.getElementById(`row-${id}`).remove();
        }
    }
</script>

<?= $this->endSection() ?>
