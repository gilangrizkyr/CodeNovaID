<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Portfolio -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div
            class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2">
        </div>
        <div class="absolute top-1/2 right-0 w-64 h-64 bg-primary-400 rounded-full filter blur-3xl translate-x-1/2">
        </div>
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <span
            class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-400 uppercase bg-primary-400/10 rounded-full border border-primary-400/20">
            Our Masterpieces
        </span>
        <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6">Karya & Portofolio</h1>
        <p class="max-w-2xl mx-auto text-lg text-slate-400">Bukti nyata dedikasi kami dalam menghadirkan solusi
            teknologi berkualitas untuk setiap klien.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <?php foreach ($portfolios as $item): ?>
            <div
                class="group relative bg-white rounded-[2.5rem] border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500">
                <div class="aspect-video overflow-hidden relative">
                    <?php if ($item->thumbnail): ?>
                        <img src="<?= base_url($item->thumbnail) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                    <?php endif; ?>
                    <div class="absolute top-6 left-6">
                        <span
                            class="px-4 py-2 bg-white/90 backdrop-blur shadow-xl rounded-full text-xs font-bold text-slate-900"><?= $item->service_title ?></span>
                    </div>
                </div>
                <div class="p-10">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-primary-600 transition">
                            <?= $item->title ?></h3>
                        <span class="text-sm font-bold text-slate-300"><?= $item->project_year ?></span>
                    </div>
                    <p class="text-slate-500 leading-relaxed mb-8 line-clamp-2"><?= $item->short_description ?></p>
                    <div class="flex items-center justify-between border-t border-slate-50 pt-8">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="ml-3 text-sm font-bold text-slate-700"><?= $item->client_name ?></span>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('portfolio/' . $item->slug) ?>" class="absolute inset-0 z-10"></a>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>

<?= $this->endSection() ?>