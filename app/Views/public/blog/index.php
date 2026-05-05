<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Blog -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary-400 rounded-full filter blur-3xl -translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block py-1.5 px-4 mb-6 text-sm font-bold tracking-wider text-primary-400 uppercase bg-primary-400/10 rounded-full border border-primary-400/20">
            Insights & News
        </span>
        <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-6">Blog & Insight</h1>
        <p class="max-w-2xl mx-auto text-lg text-slate-400">Temukan artikel menarik seputar pengembangan teknologi, strategi bisnis digital, dan tutorial terbaru.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">

        <div class="flex flex-wrap -mx-4">
            <!-- Sidebar / Categories -->
            <div class="w-full lg:w-3/12 px-4 mb-12 lg:mb-0">
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-100 sticky top-28">
                    <h4 class="font-bold text-slate-900 mb-6 pb-4 border-b border-slate-50">Kategori</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="<?= base_url('blog') ?>" class="flex items-center justify-between text-sm font-bold text-primary-600">
                                Semua Artikel
                                <span class="h-1.5 w-1.5 rounded-full bg-primary-600"></span>
                            </a>
                        </li>
                        <?php foreach($categories as $cat): ?>
                        <li>
                            <a href="<?= base_url('blog?category='.$cat->slug) ?>" class="flex items-center justify-between text-sm font-medium text-slate-500 hover:text-primary-600 transition">
                                <?= $cat->name ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Blog List -->
            <div class="w-full lg:w-9/12 px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <?php if (empty($posts)): ?>
                        <div class="col-span-full py-20 text-center text-slate-400 italic bg-white rounded-[2rem] border border-dashed border-slate-200">
                            Belum ada artikel yang dipublikasikan.
                        </div>
                    <?php else: ?>
                        <?php foreach($posts as $post): ?>
                        <div class="group relative bg-white rounded-[2.5rem] border border-slate-100 overflow-hidden hover:shadow-2xl transition duration-500 flex flex-col h-full">
                            <div class="aspect-video overflow-hidden">
                                <?php if ($post->thumbnail): ?>
                                    <img src="<?= base_url($post->thumbnail) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                                <?php else: ?>
                                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300 italic text-xs">No Image</div>
                                <?php endif; ?>
                            </div>
                            <div class="p-8 flex flex-col flex-1">
                                <div class="flex items-center mb-4">
                                    <span class="px-3 py-1 bg-primary-50 text-primary-600 text-[10px] font-bold uppercase rounded-lg"><?= $post->category_name ?></span>
                                    <span class="mx-3 text-slate-300">•</span>
                                    <span class="text-xs text-slate-400 font-medium"><?= date('d M Y', strtotime($post->created_at)) ?></span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-primary-600 transition leading-tight"><?= $post->title ?></h3>
                                <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-2"><?= $post->excerpt ?: substr(strip_tags($post->content), 0, 100) ?></p>
                                <div class="mt-auto pt-6 border-t border-slate-50 flex items-center">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400 uppercase">
                                            <?= substr($post->author_name, 0, 1) ?>
                                        </div>
                                        <span class="ml-2 text-xs font-bold text-slate-700"><?= $post->author_name ?></span>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('blog/'.$post->slug) ?>" class="absolute inset-0 z-10"></a>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
