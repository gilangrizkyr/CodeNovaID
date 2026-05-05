<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Services -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-primary-400 rounded-full filter blur-3xl -translate-x-1/2 translate-y-1/2">
        </div>
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <span
            class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-400 uppercase bg-primary-400/10 rounded-full border border-primary-400/20">
            Expert Solutions
        </span>
        <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6">Layanan Teknologi Kami</h1>
        <p class="max-w-2xl mx-auto text-lg text-slate-400">Kami menghadirkan solusi digital yang inovatif dan terukur
            untuk membantu pertumbuhan bisnis Anda di era modern.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($services as $item): ?>
            <div
                class="group bg-white rounded-3xl border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-primary-100 transition-all duration-500">
                <div class="aspect-video overflow-hidden relative">
                    <?php if ($item->thumbnail): ?>
                        <img src="<?= base_url($item->thumbnail) ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <?php else: ?>
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                    <?php endif; ?>
                    <div
                        class="absolute inset-0 bg-primary-600/10 opacity-0 group-hover:opacity-100 transition duration-500">
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-900 mb-4"><?= $item->title ?></h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3"><?= $item->short_description ?></p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-primary-600 uppercase tracking-widest">Mulai Dari</span>
                        <span class="text-lg font-extrabold text-slate-900"><?= format_rupiah($item->price_start) ?></span>
                    </div>
                    <a href="<?= base_url('services/' . $item->slug) ?>" class="absolute inset-0 z-10"></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>

<!-- Why Us Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-display font-extrabold text-slate-900 mb-8 leading-tight">Mengapa Memilih
                        Solusi IT Kami?</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div
                                class="h-10 w-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Teknologi Terkini</h4>
                                <p class="text-slate-500 text-sm">Kami menggunakan stack teknologi modern untuk menjamin
                                    performa dan keamanan sistem.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-10 w-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Transparansi Harga</h4>
                                <p class="text-slate-500 text-sm">Tidak ada biaya tersembunyi. Semua kesepakatan
                                    tertuang jelas dalam kontrak kerja.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="h-10 w-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Support Berkelanjutan</h4>
                                <p class="text-slate-500 text-sm">Kami memberikan garansi maintenance dan bantuan teknis
                                    setelah project selesai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80"
                    alt="Team Work" class="rounded-3xl shadow-2xl">
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>