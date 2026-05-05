<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div class="flex items-center">
        <a href="<?= base_url('admin/inquiries') ?>" class="mr-4 p-2 bg-white rounded-lg border border-slate-100 text-slate-500 hover:text-slate-900 shadow-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Detail Inquiry</h2>
            <p class="text-slate-500 text-sm mt-1">Kode Tracking: <span class="font-mono font-bold text-primary-600"><?= $inquiry->tracking_code ?></span></p>
        </div>
    </div>
    <div>
        <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-slate-900 text-white">
            Status: <?= $inquiry->status ?>
        </span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Info -->
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6 border-b border-slate-50 pb-4">Isi Pesan / Project Detail</h3>
            <div class="prose prose-slate max-w-none">
                <p class="text-slate-700 leading-relaxed whitespace-pre-wrap"><?= $inquiry->project_detail ?></p>
            </div>
            
            <div class="mt-8 grid grid-cols-2 gap-6 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Budget Range</p>
                    <p class="font-bold text-slate-900"><?= $inquiry->budget_range ?: 'Tidak disebutkan' ?></p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Source Page</p>
                    <p class="font-bold text-slate-900"><?= $inquiry->source_page ?: '-' ?></p>
                </div>
            </div>
        </div>

        <!-- Conversation / Replies -->
        <div class="space-y-6">
            <h3 class="text-lg font-bold text-slate-900 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                Riwayat Komunikasi
            </h3>

            <?php if (empty($replies)): ?>
                <div class="bg-slate-50 p-6 rounded-2xl border border-dashed border-slate-200 text-center text-slate-400 italic">
                    Belum ada balasan untuk inquiry ini.
                </div>
            <?php else: ?>
                <?php foreach($replies as $reply): ?>
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm relative">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xs uppercase">
                                <?= substr($reply->admin_name, 0, 1) ?>
                            </div>
                            <span class="ml-3 font-bold text-slate-900 text-sm"><?= $reply->admin_name ?></span>
                        </div>
                        <span class="text-[10px] text-slate-400 font-medium"><?= date('d M Y, H:i', strtotime($reply->created_at)) ?></span>
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed"><?= $reply->message ?></p>
                    <?php if ($reply->is_sent_email): ?>
                        <span class="absolute bottom-4 right-6 text-[9px] text-green-500 font-bold flex items-center uppercase tracking-widest">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email Sent
                        </span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- Reply Form -->
            <div class="bg-white p-8 rounded-3xl border-2 border-primary-100 shadow-xl shadow-primary-50">
                <h4 class="font-bold text-slate-900 mb-4">Balas Inquiry</h4>
                <form action="<?= base_url('admin/inquiries/reply/'.$inquiry->id) ?>" method="POST">
                    <?= csrf_field() ?>
                    <textarea name="message" rows="5" required
                              class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition mb-4"
                              placeholder="Tulis balasan atau catatan di sini..."></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary-600 text-white font-bold px-8 py-3 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Simpan Balasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div class="space-y-8">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
            <h3 class="text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Data Calon Klien</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Nama Lengkap</label>
                    <p class="font-bold text-slate-900"><?= $inquiry->name ?></p>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Email Address</label>
                    <a href="mailto:<?= $inquiry->email ?>" class="font-bold text-primary-600 hover:underline"><?= $inquiry->email ?></a>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">WhatsApp / Phone</label>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $inquiry->phone) ?>" target="_blank" class="font-bold text-green-600 hover:underline"><?= $inquiry->phone ?></a>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Perusahaan / Instansi</label>
                    <p class="font-bold text-slate-900"><?= $inquiry->company ?: '-' ?></p>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">IP Address</label>
                    <p class="text-slate-500 font-mono text-xs"><?= $inquiry->ip_address ?></p>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 p-8 rounded-3xl text-white">
            <h3 class="text-lg font-bold mb-4">Butuh Bantuan?</h3>
            <p class="text-slate-400 text-sm mb-6 leading-relaxed">Gunakan template email yang tersedia di pengaturan untuk mempercepat proses balasan kepada klien.</p>
            <a href="<?= base_url('admin/settings/email-templates') ?>" class="block text-center py-3 bg-white/10 hover:bg-white/20 rounded-xl transition font-bold text-sm">
                Lihat Email Templates
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
