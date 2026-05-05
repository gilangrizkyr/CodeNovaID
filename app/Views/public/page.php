<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Page -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl translate-x-1/2 -translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6"><?= $page->title ?></h1>
        <p class="max-w-2xl mx-auto text-lg text-slate-400"><?= $page->meta_description ?? 'Informasi selengkapnya mengenai CodeNova Indonesia.' ?></p>
    </div>
</section>

<!-- Page Content -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto prose prose-lg prose-slate max-w-none">
            <?= $page->content ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
