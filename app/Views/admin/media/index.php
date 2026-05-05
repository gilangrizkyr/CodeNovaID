<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Media Library</h2>
        <p class="text-slate-500 text-sm mt-1">Pusat aset gambar dan dokumen website.</p>
    </div>
    <form action="<?= base_url('admin/media/upload') ?>" method="POST" enctype="multipart/form-data" class="mt-4 md:mt-0 flex items-center space-x-2">
        <?= csrf_field() ?>
        <input type="file" name="files[]" multiple required class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100 transition">
        <button type="submit" class="bg-primary-600 text-white font-bold px-4 py-2 rounded-lg hover:bg-primary-700 transition">Upload</button>
    </form>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
    <?php if (empty($media)): ?>
        <div class="col-span-full py-20 text-center text-slate-400 italic bg-white rounded-2xl border border-dashed border-slate-200">
            Belum ada media yang diupload.
        </div>
    <?php else: ?>
        <?php foreach($media as $item): ?>
        <div class="group relative aspect-square bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden" id="media-<?= $item->id ?>">
            <img src="<?= $item->thumb_path ? base_url($item->thumb_path) : '' ?>" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center space-x-2">
                <button onclick="copyToClipboard('<?= $item->file_path ? base_url($item->file_path) : '' ?>')" class="p-2 bg-white rounded-lg text-slate-900 hover:bg-primary-50 hover:text-primary-600 transition" title="Copy Link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                </button>
                <button onclick="deleteMedia(<?= $item->id ?>)" class="p-2 bg-white rounded-lg text-red-600 hover:bg-red-50 transition" title="Hapus">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            
            <div class="absolute bottom-0 left-0 w-full p-2 bg-gradient-to-t from-black/80 to-transparent">
                <p class="text-[10px] text-white truncate font-medium"><?= $item->filename ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('URL Media disalin ke clipboard!');
        });
    }

    async function deleteMedia(id) {
        if (confirm('Hapus media ini secara permanen?')) {
            try {
                const response = await fetch(`<?= base_url('admin/media/delete') ?>/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
                    }
                });
                const result = await response.json();
                if (result.status === 'success') {
                    document.getElementById(`media-${id}`).remove();
                }
            } catch (error) {
                alert('Gagal menghapus media.');
            }
        }
    }
</script>

<?= $this->endSection() ?>
