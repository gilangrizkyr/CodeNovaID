<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Profile -->
<section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-400 rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-12 text-center md:text-left">
            <div class="w-48 h-48 md:w-64 md:h-64 rounded-3xl overflow-hidden border-4 border-slate-800 shadow-2xl flex-shrink-0 relative group">
                <img src="<?= $member->photo ? base_url($member->photo) : 'https://ui-avatars.com/api/?name='.urlencode($member->name).'&background=random' ?>" 
                     alt="<?= $member->name ?>" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
            </div>
            
            <div>
                <?php if($member->department): ?>
                <span class="inline-block py-1 px-3 mb-4 text-[10px] font-bold tracking-widest text-primary-400 uppercase bg-primary-400/10 border border-primary-400/20 rounded-full">
                    <?= $member->department ?> Team
                </span>
                <?php endif; ?>
                
                <h1 class="text-4xl md:text-5xl font-display font-extrabold text-white mb-2">
                    <?= $member->name ?>
                </h1>
                
                <?php if($member->position): ?>
                <p class="text-xl text-primary-500 font-bold mb-6"><?= $member->position ?></p>
                <?php endif; ?>
                
                <div class="flex justify-center md:justify-start space-x-4">
                    <?php if($member->linkedin_url): ?>
                    <a href="<?= $member->linkedin_url ?>" target="_blank" class="w-12 h-12 bg-slate-800 text-slate-300 rounded-2xl flex items-center justify-center hover:bg-primary-600 hover:text-white transition-all shadow-lg border border-slate-700" title="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if($member->instagram_url): ?>
                    <a href="<?= $member->instagram_url ?>" target="_blank" class="w-12 h-12 bg-slate-800 text-slate-300 rounded-2xl flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all shadow-lg border border-slate-700" title="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if($member->twitter_url): ?>
                    <a href="<?= $member->twitter_url ?>" target="_blank" class="w-12 h-12 bg-slate-800 text-slate-300 rounded-2xl flex items-center justify-center hover:bg-slate-900 hover:text-white transition-all shadow-lg border border-slate-700" title="Twitter">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if($member->github_url): ?>
                    <a href="<?= $member->github_url ?>" target="_blank" class="w-12 h-12 bg-slate-800 text-slate-300 rounded-2xl flex items-center justify-center hover:bg-slate-700 hover:text-white transition-all shadow-lg border border-slate-700" title="GitHub">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-24 bg-white min-h-[50vh]">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-2">
                    <?php if($member->bio): ?>
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center">
                            <span class="w-8 h-1 bg-primary-600 rounded-full mr-3"></span>
                            Biografi
                        </h2>
                        <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
                            <?= $member->bio ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                        <h2 class="text-xl font-bold text-slate-900 mb-8 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informasi Profil
                        </h2>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Nama Lengkap</p>
                                    <p class="text-slate-900 font-bold"><?= $member->name ?></p>
                                </div>
                                <?php if($member->position): ?>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Jabatan</p>
                                    <p class="text-slate-900 font-bold"><?= $member->position ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if($member->department): ?>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Departemen</p>
                                    <p class="text-slate-900 font-bold"><?= $member->department ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if($member->email): ?>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Email Bisnis</p>
                                    <p class="text-slate-900 font-bold"><?= $member->email ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <?php if($member->skills): ?>
                    <?php 
                        $skills = is_string($member->skills) ? json_decode($member->skills, true) : $member->skills;
                        if($skills && !empty($skills)):
                    ?>
                    <div class="bg-slate-50 p-8 rounded-[2.5rem] border border-slate-100 mb-8">
                        <h3 class="text-xl font-bold text-slate-900 mb-6">Expertise & Skills</h3>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach($skills as $skill): ?>
                                <span class="bg-white px-4 py-2 rounded-xl text-sm font-medium text-slate-700 shadow-sm border border-slate-100">
                                    <?= $skill ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <div class="p-8 bg-primary-600 rounded-[2.5rem] text-white">
                        <h3 class="text-xl font-bold mb-4">Hubungi <?= $member->name ?></h3>
                        <p class="text-primary-100 text-sm mb-6">Tertarik bekerja sama dengan <?= $member->name ?> untuk project Anda?</p>
                        <a href="<?= base_url('kontak') ?>" class="block w-full py-3 bg-white text-primary-600 text-center font-bold rounded-2xl hover:bg-primary-50 transition-colors">
                            Mulai Diskusi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
