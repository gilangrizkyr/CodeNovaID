<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Blog & Artikel</h2>
        <p class="text-slate-500 text-sm mt-1">Kelola konten edukasi dan berita terbaru perusahaan.</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="<?= base_url('admin/blog/posts/new') ?>" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition shadow-lg shadow-primary-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tulis Artikel
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Artikel</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Kategori</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Views</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400 italic">Belum ada artikel.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($posts as $post): ?>
                    <tr class="hover:bg-slate-50/50 transition" id="row-<?= $post->id ?>">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-10 w-16 rounded bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-100">
                                    <?php if ($post->thumbnail): ?>
                                        <img src="<?= base_url($post->thumbnail) ?>" class="h-full w-full object-cover">
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4">
                                    <p class="font-bold text-slate-900 leading-tight line-clamp-1"><?= $post->title ?></p>
                                    <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-tighter">Oleh: <?= $post->author_name ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold rounded capitalize"><?= $post->category_name ?? 'Uncategorized' ?></span>
                        </td>
                        <td class="px-6 py-4">
                            <?php if ($post->status === 'published'): ?>
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-green-50 text-green-700">Published</span>
                            <?php else: ?>
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-slate-50 text-slate-500">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">
                            <?= number_format($post->views) ?>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="<?= base_url('admin/blog/posts/edit/'.$post->id) ?>" class="inline-flex p-2 text-slate-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button onclick="confirmDelete(<?= $post->id ?>)" class="inline-flex p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
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
        if (confirm('Hapus artikel ini secara permanen?')) {
            try {
                const response = await fetch(`<?= base_url('admin/blog/posts/delete') ?>/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
                    }
                });
                const result = await response.json();
                if (result.status === 'success') {
                    document.getElementById(`row-${id}`).remove();
                }
            } catch (error) {
                alert('Gagal menghapus data.');
            }
        }
    }
</script>

<?= $this->endSection() ?>
