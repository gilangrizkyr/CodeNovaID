<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Manajemen Layanan</h2>
        <p class="text-slate-500 text-sm mt-1">Kelola katalog jasa dan solusi teknologi Anda.</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="<?= base_url('admin/services/new') ?>" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition shadow-lg shadow-primary-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Layanan
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Info Layanan</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Harga Mulai</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Urutan</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($services)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400 italic">Belum ada layanan yang ditambahkan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($services as $service): ?>
                    <tr class="hover:bg-slate-50/50 transition" id="row-<?= $service->id ?>">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-100">
                                    <?php if ($service->thumbnail): ?>
                                        <img src="<?= base_url($service->thumbnail) ?>" class="h-full w-full object-cover">
                                    <?php else: ?>
                                        <div class="h-full w-full flex items-center justify-center text-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4">
                                    <p class="font-bold text-slate-900 leading-none"><?= $service->title ?></p>
                                    <p class="text-xs text-slate-500 mt-1"><?= $service->slug ?></p>
                                    <?php if ($service->is_featured): ?>
                                        <span class="inline-block mt-1 px-2 py-0.5 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase tracking-wider rounded">Featured</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-slate-700">
                            <?= format_rupiah($service->price_start) ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $service->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' ?>">
                                <span class="h-1.5 w-1.5 rounded-full mr-1.5 <?= $service->is_active ? 'bg-green-600' : 'bg-red-600' ?>"></span>
                                <?= $service->is_active ? 'Aktif' : 'Non-aktif' ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">
                            <?= $service->sort_order ?>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="<?= base_url('admin/services/edit/'.$service->id) ?>" class="inline-flex p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button onclick="confirmDelete(<?= $service->id ?>)" class="inline-flex p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
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
        if (confirm('Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan.')) {
            try {
                const response = await fetch(`<?= base_url('admin/services/delete') ?>/${id}`, {
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
                alert('Terjadi kesalahan saat menghapus data.');
            }
        }
    }
</script>

<?= $this->endSection() ?>
