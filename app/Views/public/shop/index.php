<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Shop -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-400 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-400 uppercase bg-primary-400/10 rounded-full border border-primary-400/20">
            CodeNova Shop
        </span>
        <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6">Produk & Lisensi Teknologi</h1>
        <p class="max-w-2xl mx-auto text-lg text-slate-400">Tingkatkan efisiensi bisnis Anda dengan solusi teknologi siap pakai, mulai dari script sistem informasi hingga lisensi software enterprise.</p>
    </div>
</section>

<!-- Product List -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <?php if (empty($products)): ?>
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-slate-100 text-slate-400 rounded-full mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Katalog Sedang Disiapkan</h3>
                <p class="text-slate-500">Kami sedang memperbarui daftar produk terbaru untuk Anda. Kembali lagi segera!</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($products as $p): ?>
                <div class="group relative bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-primary-100 transition-all duration-500 overflow-hidden flex flex-col">
                    <div class="relative h-64 overflow-hidden">
                        <img src="<?= $p->thumbnail ? base_url($p->thumbnail) : 'https://placehold.co/600x400/f1f5f9/64748b?text=Product' ?>" 
                             alt="<?= $p->name ?>" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold text-slate-900 uppercase tracking-widest shadow-sm">
                                Tech Solution
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-primary-600 transition-colors">
                            <?= $p->name ?>
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2">
                            <?= substr(strip_tags($p->description), 0, 100) ?>...
                        </p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <div>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Mulai Dari</p>
                                <p class="text-xl font-extrabold text-primary-600"><?= format_rupiah($p->price) ?></p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('produk/'.$p->slug) ?>" class="absolute inset-0 z-10"></a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
