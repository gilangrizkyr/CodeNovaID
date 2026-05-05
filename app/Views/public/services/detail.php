<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Header -->
<section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <nav class="flex mb-8 text-sm font-medium text-slate-400">
                <a href="<?= base_url() ?>" class="hover:text-white">Beranda</a>
                <span class="mx-3">/</span>
                <a href="<?= base_url('services') ?>" class="hover:text-white">Layanan</a>
                <span class="mx-3">/</span>
                <span class="text-primary-400"><?= $service->title ?></span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6 leading-tight"><?= $service->title ?></h1>
            <p class="text-xl text-slate-400 leading-relaxed"><?= $service->short_description ?></p>
        </div>
    </div>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary-600/10 skew-x-12 transform translate-x-1/2"></div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <!-- Content -->
            <div class="w-full lg:w-2/3 px-4 mb-16 lg:mb-0">
                <div class="prose prose-lg prose-slate max-w-none">
                    <?php if ($service->thumbnail): ?>
                        <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl">
                            <img src="<?= base_url($service->thumbnail) ?>" alt="<?= $service->title ?>" class="w-full">
                        </div>
                    <?php endif; ?>
                    
                    <div class="text-slate-700 leading-relaxed text-lg">
                        <?= $service->full_description ?: 'Detail informasi layanan sedang dalam proses pembaruan. Silakan hubungi kami untuk informasi lebih lanjut.' ?>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="mt-16 p-10 bg-slate-50 rounded-3xl border border-slate-100 flex flex-col md:flex-row items-center justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-slate-900 mb-2">Tertarik dengan layanan ini?</h4>
                        <p class="text-slate-500">Dapatkan penawaran harga terbaik untuk project Anda.</p>
                    </div>
                    <a href="<?= base_url('kontak?service='.$service->slug) ?>" class="mt-6 md:mt-0 inline-block px-8 py-4 bg-primary-600 text-white font-bold rounded-full hover:bg-primary-700 transition shadow-xl shadow-primary-200">
                        Konsultasi Sekarang
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/3 px-4">
                <div class="sticky top-28 space-y-8">
                    <!-- Pricing Card -->
                    <div class="p-8 bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">Estimasi Investasi</span>
                        <div class="flex items-baseline mb-6">
                            <span class="text-3xl font-extrabold text-slate-900"><?= format_rupiah($service->price_start) ?></span>
                            <span class="ml-2 text-slate-500 text-sm">/ Project</span>
                        </div>
                        <hr class="mb-6 border-slate-50">
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start text-sm text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Gratis Konsultasi Awal
                            </li>
                            <li class="flex items-start text-sm text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Support & Maintenance
                            </li>
                            <li class="flex items-start text-sm text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Source Code Penuh
                            </li>
                        </ul>
                        <a href="<?= base_url('kontak?service='.$service->slug) ?>" class="block w-full text-center py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-slate-800 transition">
                            Mulai Project
                        </a>
                    </div>

                    <!-- Other Services -->
                    <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-6">Layanan Lainnya</h4>
                        <div class="space-y-4">
                            <?php foreach($all_services as $s): ?>
                                <?php if($s->id != $service->id): ?>
                                <a href="<?= base_url('services/'.$s->slug) ?>" class="flex items-center p-3 bg-white rounded-xl border border-slate-100 hover:border-primary-300 transition group">
                                    <div class="h-10 w-10 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 group-hover:bg-primary-50 group-hover:text-primary-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <span class="ml-3 font-bold text-slate-900 text-sm group-hover:text-primary-600 transition"><?= $s->title ?></span>
                                </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
