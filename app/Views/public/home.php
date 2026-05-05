<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative pt-16 pb-32 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
                <div class="max-w-xl">
                    <span class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-600 uppercase bg-primary-50 rounded-full">
                        <?= get_setting('hero_badge_text', '🚀 Jasa Teknologi Terpercaya') ?>
                    </span>
                    <h1 class="text-5xl md:text-6xl font-display font-extrabold text-slate-900 mb-8 leading-tight">
                        <?= get_setting('hero_title', 'Transformasi Digital Bisnis Anda Bersama CodeNova') ?>
                    </h1>
                    <p class="text-xl text-slate-500 mb-10 leading-relaxed">
                        <?= get_setting('hero_subtitle', 'Kami menghadirkan solusi teknologi inovatif untuk membantu UMKM dan Korporat tumbuh lebih cepat.') ?>
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="<?= get_setting('hero_cta_primary_url', '#kontak') ?>" class="inline-block px-8 py-4 text-center text-white font-bold bg-primary-600 hover:bg-primary-700 rounded-full transition shadow-xl shadow-primary-200">
                            <?= get_setting('hero_cta_primary_text', 'Konsultasi Gratis') ?>
                        </a>
                        <a href="<?= get_setting('hero_cta_secondary_url', '/portofolio') ?>" class="inline-block px-8 py-4 text-center text-slate-900 font-bold bg-white border border-slate-200 hover:bg-slate-50 rounded-full transition">
                            <?= get_setting('hero_cta_secondary_text', 'Lihat Portofolio') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <div class="relative">
                    <div class="relative z-10 rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-transform duration-500">
                        <?php if ($hero_img = get_setting('hero_image')): ?>
                            <img src="<?= base_url($hero_img) ?>" alt="<?= get_setting('company_name') ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Tech Solutions" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-secondary rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-primary-500 rounded-full filter blur-3xl opacity-20"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="py-12 bg-white border-y border-slate-50 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="relative flex items-center overflow-hidden">
            <div class="animate-scroll space-x-12 md:space-x-24 py-4 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-700">
                <?php 
                // Double the list for seamless loop
                $all_clients = array_merge($clients, $clients);
                foreach($all_clients as $client): 
                ?>
                    <div class="flex-shrink-0 flex items-center h-8 md:h-12 min-w-[120px] justify-center">
                        <?php if ($client->logo): ?>
                            <img src="<?= (strpos($client->logo, 'http') === 0) ? $client->logo : base_url($client->logo) ?>" alt="<?= $client->name ?>" class="h-full w-auto object-contain">
                        <?php else: ?>
                            <span class="text-xl font-bold text-slate-400 whitespace-nowrap"><?= $client->name ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-primary-600">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4 text-center">
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-10 lg:mb-0">
                <h3 class="text-4xl font-extrabold text-white mb-2"><?= get_setting('stats_clients', '50') ?>+</h3>
                <p class="text-primary-100 font-medium">Klien Aktif</p>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-10 lg:mb-0">
                <h3 class="text-4xl font-extrabold text-white mb-2"><?= get_setting('stats_projects', '120') ?>+</h3>
                <p class="text-primary-100 font-medium">Project Selesai</p>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-10 sm:mb-0">
                <h3 class="text-4xl font-extrabold text-white mb-2"><?= get_setting('stats_years', '5') ?>+</h3>
                <p class="text-primary-100 font-medium">Tahun Pengalaman</p>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4">
                <h3 class="text-4xl font-extrabold text-white mb-2"><?= get_setting('stats_retention', '95') ?>%</h3>
                <p class="text-primary-100 font-medium">Client Retention</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
                <div class="relative">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl">
                        <?php if ($about_img = get_setting('about_image')): ?>
                            <img src="<?= base_url($about_img) ?>" alt="About CodeNova" class="w-full h-full object-cover">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="About Us" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-primary-600 rounded-3xl flex items-center justify-center text-white font-bold text-center p-4 z-20 shadow-xl">
                        Est. 2018
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 px-4 lg:pl-16">
                <span class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-600 uppercase bg-primary-50 rounded-full">
                    Siapa Kami
                </span>
                <h2 class="text-4xl md:text-5xl font-display font-extrabold text-slate-900 mb-8 leading-tight">
                    Membangun Masa Depan Digital Indonesia
                </h2>
                <p class="text-lg text-slate-500 mb-10 leading-relaxed">
                    <?= get_setting('about_story') ?>
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-12">
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-primary-600 shadow-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Visi Kami</h4>
                        <p class="text-sm text-slate-500"><?= get_setting('about_vision') ?></p>
                    </div>
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-secondary shadow-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-2">Misi Kami</h4>
                        <p class="text-sm text-slate-500"><?= get_setting('about_mission') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="layanan" class="py-32 bg-slate-50/50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-4xl font-display font-extrabold text-slate-900 mb-6">Layanan Unggulan Kami</h2>
            <p class="text-lg text-slate-500">Kami menyediakan berbagai solusi IT yang disesuaikan dengan kebutuhan bisnis Anda, mulai dari startup hingga korporasi.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($services as $service): ?>
            <div class="p-10 rounded-3xl bg-white border border-slate-100 hover:shadow-2xl hover:shadow-primary-100 transition-all duration-300 group">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-8 shadow-sm group-hover:bg-primary-600 group-hover:text-white transition-colors">
                    <?php if ($service->icon_svg): ?>
                        <?= $service->icon_svg ?>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    <?php endif; ?>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-4"><?= $service->title ?></h3>
                <p class="text-slate-500 mb-8 leading-relaxed"><?= $service->short_description ?></p>
                <a href="<?= base_url('services/'.$service->slug) ?>" class="text-primary-600 font-bold flex items-center group-hover:translate-x-2 transition-transform">
                    Selengkapnya 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-2xl">
                <h2 class="text-4xl font-display font-extrabold text-slate-900 mb-6">Kisah Sukses Klien Kami</h2>
                <p class="text-lg text-slate-500">Lihat bagaimana kami membantu berbagai bisnis mencapai tujuan digital mereka melalui solusi yang tepat guna.</p>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="<?= base_url('portfolio') ?>" class="inline-flex items-center font-bold text-primary-600 hover:text-primary-700">
                    Lihat Semua Portofolio
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach($portfolios as $p): ?>
            <div class="group relative rounded-[2rem] overflow-hidden shadow-lg h-[400px]">
                <img src="<?= $p->thumbnail ? base_url($p->thumbnail) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' ?>" 
                     alt="<?= $p->title ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-90 transition-opacity group-hover:opacity-100"></div>
                <div class="absolute bottom-0 left-0 p-10 w-full transform transition-transform duration-500 group-hover:-translate-y-2">
                    <span class="inline-block py-1 px-3 mb-4 text-[10px] font-bold tracking-widest text-primary-400 uppercase bg-primary-400/10 border border-primary-400/20 rounded-full">
                        Case Study
                    </span>
                    <h3 class="text-2xl font-bold text-white mb-2"><?= $p->title ?></h3>
                    <p class="text-slate-300 text-sm mb-6 line-clamp-2"><?= $p->short_description ?></p>
                    <a href="<?= base_url('portfolio/'.$p->slug) ?>" class="inline-flex items-center text-sm font-bold text-white hover:text-primary-400 transition-colors">
                        Baca Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-32 bg-slate-50/50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-4xl font-display font-extrabold text-slate-900 mb-6">Tim Ahli Kami</h2>
            <p class="text-lg text-slate-500">Talenta terbaik yang siap mewujudkan visi teknologi bisnis Anda.</p>
        </div>
        
        <div class="flex flex-nowrap overflow-x-auto hide-scrollbar gap-8 pb-8 px-4 -mx-4 snap-x snap-mandatory">
            <?php foreach($team as $member): ?>
            <a href="<?= base_url('tim/'.$member->slug) ?>" class="flex-shrink-0 w-72 group bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all text-center snap-center">
                <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-6 border-4 border-slate-50 group-hover:border-primary-500 transition-colors">
                    <img src="<?= $member->photo ? base_url($member->photo) : 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&background=random' ?>" 
                         alt="<?= $member->name ?>" class="w-full h-full object-cover">
                </div>
                <h4 class="text-xl font-bold text-slate-900"><?= $member->name ?></h4>
                <p class="text-primary-600 text-sm font-medium mb-4"><?= $member->position ?></p>
                <div class="flex justify-center space-x-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="text-primary-600 text-xs font-bold uppercase tracking-wider">Lihat Profil &rarr;</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-32 bg-slate-900 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-4xl font-display font-extrabold text-white mb-6">Apa Kata Klien Kami?</h2>
            <p class="text-lg text-slate-400">Kepuasan klien adalah prioritas utama kami. Berikut adalah pengalaman mereka bekerja bersama CodeNova.</p>
        </div>
        
        <div class="flex flex-nowrap overflow-x-auto hide-scrollbar gap-8 pb-8 px-4 -mx-4 snap-x snap-mandatory">
            <?php foreach($testimonials as $t): ?>
            <div class="flex-shrink-0 w-80 md:w-[400px] bg-slate-800/50 backdrop-blur-sm p-10 rounded-[2.5rem] border border-slate-700 hover:border-primary-500/50 transition-colors group snap-center">
                <div class="flex items-center text-yellow-400 mb-6">
                    <?php for($i=0; $i<$t->rating; $i++): ?>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <?php endfor; ?>
                </div>
                <p class="text-slate-300 text-lg italic mb-8 leading-relaxed line-clamp-4">"<?= $t->content ?>"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4 border-2 border-slate-700 group-hover:border-primary-500 transition-colors">
                        <img src="<?= $t->client_photo ? base_url($t->client_photo) : 'https://ui-avatars.com/api/?name='.urlencode($t->client_name).'&background=random' ?>" 
                             alt="<?= $t->client_name ?>" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="text-white font-bold"><?= $t->client_name ?></h4>
                        <p class="text-slate-500 text-sm"><?= $t->client_position ?>, <?= $t->client_company ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-4xl font-display font-extrabold text-slate-900 mb-6">Pertanyaan Populer</h2>
            <p class="text-lg text-slate-500">Mungkin Anda memiliki pertanyaan yang sama dengan klien kami sebelumnya.</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4" x-data="{selected: null}">
            <?php foreach($faqs as $i => $faq): ?>
            <div class="rounded-2xl border border-slate-100 overflow-hidden">
                <button @click="selected !== <?= $i ?> ? selected = <?= $i ?> : selected = null" 
                        class="flex items-center justify-between w-full px-8 py-6 text-left bg-white hover:bg-slate-50 transition-colors">
                    <span class="text-lg font-bold text-slate-900"><?= $faq->question ?></span>
                    <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-300" :class="selected === <?= $i ?> ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-8 overflow-hidden transition-all duration-500 max-h-0" :style="selected === <?= $i ?> ? 'max-height: 500px; padding-bottom: 2rem;' : ''">
                    <p class="text-slate-500 leading-relaxed"><?= $faq->answer ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="bg-slate-900 rounded-[3rem] p-12 md:p-20 relative overflow-hidden text-center">
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-8">Siap Memulai Transformasi Digital Anda?</h2>
                <p class="text-xl text-slate-400 mb-10">Konsultasikan kebutuhan teknologi Anda dengan tim ahli kami secara gratis.</p>
                <a href="<?= base_url('kontak') ?>" class="inline-block px-10 py-5 text-white font-bold bg-primary-600 hover:bg-primary-700 rounded-full transition shadow-2xl shadow-primary-500/20">
                    Hubungi Kami Sekarang
                </a>
            </div>
            <!-- Abstract background shape -->
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-primary-500 rounded-full filter blur-[120px] opacity-20"></div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
