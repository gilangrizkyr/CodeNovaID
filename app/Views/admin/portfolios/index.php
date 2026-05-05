<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Portofolio Project</h2>
        <p class="text-slate-500 text-sm mt-1">Daftar hasil kerja dan project yang telah diselesaikan.</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="<?= base_url('admin/portfolios/new') ?>" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition shadow-lg shadow-primary-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Portofolio
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Project</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Layanan / Klien</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Tahun</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Featured</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($portfolios)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400 italic">Belum ada portofolio yang ditambahkan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($portfolios as $item): ?>
                    <tr class="hover:bg-slate-50/50 transition" id="row-<?= $item->id ?>">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-12 w-20 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-100">
                                    <?php if ($item->thumbnail): ?>
                                        <img src="<?= base_url($item->thumbnail) ?>" class="h-full w-full object-cover">
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4">
                                    <p class="font-bold text-slate-900 leading-none"><?= $item->title ?></p>
                                    <p class="text-xs text-slate-500 mt-1"><?= $item->slug ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-slate-900"><?= $item->service_title ?? 'Tanpa Layanan' ?></p>
                            <p class="text-xs text-slate-500"><?= $item->client_name ?></p>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-700">
                            <?= $item->project_year ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php if ($item->is_featured): ?>
                                <span class="px-2 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase rounded">Featured</span>
                            <?php else: ?>
                                <span class="text-slate-300 text-[10px] font-bold uppercase">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="<?= base_url('admin/portfolios/edit/'.$item->id) ?>" class="inline-flex p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button onclick="confirmDelete(<?= $item->id ?>)" class="inline-flex p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    async function confirmDelete(id) {
        if (confirm('Hapus portofolio ini? Semua foto terkait akan dihapus secara permanen.')) {
            try {
                const response = await fetch(`<?= base_url('admin/portfolios/delete') ?>/${id}`, {
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
                }
            } catch (error) {
                alert('Gagal menghapus data.');
            }
        }
    }
</script>

<?= $this->endSection() ?>
