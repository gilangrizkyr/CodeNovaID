<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Subscriber Newsletter</h2>
        <p class="text-slate-500 text-sm mt-1">Daftar email pengunjung yang tertarik dengan update Anda.</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-bold">
                <tr>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tgl Terdaftar</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach($subscribers as $s): ?>
                <tr class="hover:bg-slate-50/50 transition" id="row-<?= $s->id ?>">
                    <td class="px-6 py-4 font-bold text-slate-900"><?= $s->email ?></td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase <?= $s->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' ?>">
                            <?= $s->is_active ? 'Aktif' : 'Non-aktif' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-slate-500 text-sm"><?= date('d M Y', strtotime($s->created_at)) ?></td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="<?= base_url('admin/subscribers/toggle/'.$s->id) ?>" class="text-slate-400 hover:text-primary-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </a>
                        <button onclick="deleteSub(<?= $s->id ?>)" class="text-slate-400 hover:text-red-600 transition">
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
    async function deleteSub(id) {
        if (confirm('Hapus subscriber ini?')) {
            const response = await fetch(`<?= base_url('admin/subscribers/delete') ?>/${id}`, {
                method: 'DELETE',
                headers: { 'X-Requested-With': 'XMLHttpRequest', '<?= csrf_header() ?>': '<?= csrf_hash() ?>' }
            });
            if (response.ok) document.getElementById(`row-${id}`).remove();
        }
    }
</script>

<?= $this->endSection() ?>
