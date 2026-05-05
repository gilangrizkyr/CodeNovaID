<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Blog Detail -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-400 rounded-full filter blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center justify-center space-x-3 mb-6">
                <span class="px-4 py-1.5 bg-primary-400/10 text-primary-400 text-xs font-bold uppercase tracking-widest rounded-full border border-primary-400/20"><?= $post->category_name ?? 'Uncategorized' ?></span>
                <span class="text-slate-700">•</span>
                <span class="text-sm text-slate-400 font-medium"><?= date('d M Y', strtotime($post->created_at)) ?></span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-8 leading-tight"><?= $post->title ?></h1>
            <div class="flex items-center justify-center">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($post->author_name) ?>&background=0e8ce9&color=fff" class="h-10 w-10 rounded-full mr-3 shadow-lg border-2 border-slate-700">
                <div class="text-left">
                    <p class="text-sm font-bold text-white leading-none"><?= $post->author_name ?></p>
                    <p class="text-[10px] text-slate-500 font-bold uppercase mt-1 tracking-widest">Penulis di CodeNova</p>
                </div>
            </div>
        </div>
    </div>
</section>

<article class="py-24 bg-white">
    <div class="container mx-auto px-4">

        <!-- Main Image -->
        <?php if ($post->thumbnail): ?>
        <div class="max-w-5xl mx-auto mb-20 rounded-[3rem] overflow-hidden shadow-2xl border border-slate-100">
            <img src="<?= base_url($post->thumbnail) ?>" alt="<?= $post->title ?>" class="w-full h-auto">
        </div>
        <?php endif; ?>

        <!-- Content Area -->
        <div class="max-w-3xl mx-auto">
            <div class="prose prose-lg md:prose-xl prose-slate max-w-none text-slate-700 leading-relaxed font-sans">
                <?= $post->content ?>
            </div>

            <!-- Footer Meta -->
            <div class="mt-20 pt-10 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-bold text-slate-400">BAGIKAN:</span>
                    <div class="flex space-x-2">
                        <button class="h-10 w-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 hover:bg-primary-600 hover:text-white transition">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </button>
                        <button class="h-10 w-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 hover:bg-primary-600 hover:text-white transition">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center text-slate-400 text-xs font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <?= number_format($post->views) ?> Kali Dilihat
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Related Articles -->
<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl font-bold text-slate-900 mb-12 text-center">Artikel Terkait</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach($related as $r): ?>
            <a href="<?= base_url('blog/'.$r->slug) ?>" class="group bg-white p-6 rounded-3xl border border-slate-100 hover:shadow-xl transition flex flex-col h-full">
                <div class="aspect-video rounded-2xl overflow-hidden mb-6">
                    <img src="<?= $r->thumbnail ? base_url($r->thumbnail) : 'https://placehold.co/600x400/f1f5f9/64748b?text=Blog' ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <h4 class="font-bold text-slate-900 group-hover:text-primary-600 transition line-clamp-2"><?= $r->title ?></h4>
                <p class="text-[10px] text-slate-400 mt-auto pt-4 border-t border-slate-50 font-bold uppercase tracking-widest"><?= date('d M Y', strtotime($r->created_at)) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
