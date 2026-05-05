<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Portfolio Detail -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-400 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-400 uppercase bg-primary-400/10 rounded-full border border-primary-400/20">
            Case Study Portofolio
        </span>
        <h1 class="text-4xl md:text-6xl font-display font-extrabold text-white mb-8 leading-tight max-w-4xl mx-auto"><?= $portfolio->title ?></h1>
        
        <div class="flex flex-wrap justify-center items-center gap-8 text-slate-400 font-medium">
            <div class="flex items-center">
                <span class="text-xs font-bold uppercase tracking-widest mr-2 text-primary-400">Klien:</span>
                <span class="text-white"><?= $portfolio->client_name ?></span>
            </div>
            <div class="flex items-center">
                <span class="text-xs font-bold uppercase tracking-widest mr-2 text-primary-400">Tahun:</span>
                <span class="text-white"><?= $portfolio->project_year ?></span>
            </div>
            <?php if($portfolio->project_url): ?>
            <div class="flex items-center">
                <span class="text-xs font-bold uppercase tracking-widest mr-2 text-primary-400">Live URL:</span>
                <a href="<?= $portfolio->project_url ?>" target="_blank" class="text-primary-400 hover:text-white transition">Kunjungi Situs</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <!-- Gallery / Hero Image -->
        <?php if ($portfolio->thumbnail): ?>
        <div class="mb-24 rounded-[3rem] overflow-hidden shadow-2xl">
            <img src="<?= base_url($portfolio->thumbnail) ?>" alt="<?= $portfolio->title ?>" class="w-full">
        </div>
        <?php endif; ?>

        <!-- Project Story -->
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-xl prose-slate max-w-none mb-24">
                <h3 class="text-3xl font-bold text-slate-900 mb-8">Gambaran Project</h3>
                <p class="text-slate-600 leading-relaxed"><?= $portfolio->description ?></p>
            </div>

            <!-- Challenge & Solution -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">
                <div class="p-10 bg-slate-50 rounded-3xl border border-slate-100">
                    <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-red-500 shadow-sm mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Tantangan</h4>
                    <p class="text-slate-600 text-sm leading-relaxed"><?= $portfolio->challenge ?: 'Analisis tantangan sedang disiapkan.' ?></p>
                </div>
                <div class="p-10 bg-primary-50 rounded-3xl border border-primary-100">
                    <div class="h-12 w-12 bg-white rounded-2xl flex items-center justify-center text-primary-600 shadow-sm mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-4">Solusi Kami</h4>
                    <p class="text-slate-600 text-sm leading-relaxed"><?= $portfolio->solution ?: 'Implementasi solusi sedang disiapkan.' ?></p>
                </div>
            </div>

            <!-- Result -->
            <div class="bg-slate-900 rounded-[3rem] p-12 md:p-16 text-center text-white mb-24 relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-2xl font-bold mb-6">Hasil & Dampak</h4>
                    <p class="text-slate-400 text-lg leading-relaxed max-w-2xl mx-auto"><?= $portfolio->result ?: 'Project ini memberikan dampak signifikan terhadap efisiensi operasional klien.' ?></p>
                </div>
                <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <?php if (!empty($gallery)): ?>
        <div class="mb-24">
            <h3 class="text-2xl font-bold text-slate-900 mb-12 text-center">Galeri Project</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($gallery as $img): ?>
                <div class="rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-500 cursor-pointer">
                    <?php if ($img->image_path): ?>
                        <img src="<?= base_url($img->image_path) ?>" class="w-full h-full object-cover">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Related Projects -->
<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl font-bold text-slate-900 mb-12 text-center">Project Lainnya</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach($related as $r): ?>
            <a href="<?= base_url('portfolio/'.$r->slug) ?>" class="group bg-white p-6 rounded-3xl border border-slate-100 hover:shadow-xl transition">
                <div class="aspect-video rounded-2xl overflow-hidden mb-6">
                    <img src="<?= $r->thumbnail ? base_url($r->thumbnail) : 'https://placehold.co/600x400/f1f5f9/64748b?text=Portfolio' ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h4 class="font-bold text-slate-900 group-hover:text-primary-600 transition"><?= $r->title ?></h4>
                <p class="text-xs text-slate-500 mt-2"><?= $r->client_name ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
