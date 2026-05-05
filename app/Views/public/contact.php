<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4 items-center">
            <!-- Contact Info -->
            <div class="w-full lg:w-5/12 px-4 mb-16 lg:mb-0">
                <div class="max-w-md">
                    <span class="inline-block px-4 py-2 bg-primary-100 text-primary-600 rounded-full text-xs font-bold uppercase tracking-widest mb-6">Mulai Konsultasi</span>
                    <h1 class="text-4xl md:text-5xl font-display font-extrabold text-slate-900 mb-8 leading-tight">Mari Bicara Tentang Project Anda</h1>
                    <p class="text-lg text-slate-500 mb-12">Punya ide brilian atau masalah teknis yang ingin diselesaikan? Tim kami siap membantu mewujudkannya menjadi solusi nyata.</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-2xl bg-white shadow-lg shadow-slate-100 flex items-center justify-center text-primary-600 mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Email Kami</p>
                                <p class="text-slate-900 font-bold"><?= get_setting('company_email') ?></p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-2xl bg-white shadow-lg shadow-slate-100 flex items-center justify-center text-green-500 mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.316 1.592 5.43 0 9.856-4.426 9.858-9.855.002-5.43-4.425-9.856-9.853-9.856-5.431 0-9.856 4.426-9.858 9.855-.001 1.938.529 3.756 1.534 5.233l-1.007 3.676 3.778-.991zm10.744-7.061c-.303-.151-1.788-.882-2.064-.983-.277-.101-.478-.151-.678.151-.201.302-.779.983-.955 1.183-.176.201-.352.227-.655.076-.303-.151-1.281-.472-2.441-1.506-.902-.804-1.51-1.797-1.687-2.099-.176-.302-.019-.465.132-.615.136-.135.303-.353.454-.529.151-.177.202-.303.303-.505.101-.202.05-.378-.026-.529-.076-.151-.678-1.636-.93-2.241-.244-.59-.493-.51-.678-.519-.174-.01-.374-.012-.574-.012-.201 0-.528.076-.804.378-.276.302-1.056 1.034-1.056 2.522s1.081 2.923 1.232 3.124c.151.202 2.127 3.248 5.153 4.555.72.311 1.282.497 1.721.637.722.23 1.379.197 1.9.12.58-.087 1.788-.731 2.039-1.437.252-.706.252-1.31.176-1.437-.076-.127-.277-.202-.58-.353z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">WhatsApp Business</p>
                                <p class="text-slate-900 font-bold"><?= get_setting('company_whatsapp') ?: get_setting('company_phone') ?></p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-2xl bg-white shadow-lg shadow-slate-100 flex items-center justify-center text-primary-600 mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Alamat Kantor</p>
                                <p class="text-slate-900 font-bold"><?= get_setting('company_address') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="w-full lg:w-7/12 px-4">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-slate-200 border border-slate-100">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="mb-8 p-6 bg-green-50 border border-green-100 rounded-3xl text-green-700 flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-bold">Berhasil Terkirim!</p>
                                <p class="text-sm mt-1"><?= session()->getFlashdata('success') ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('kontak') ?>" method="POST" class="space-y-6">
                        <?= csrf_field() ?>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Anda</label>
                                <input type="text" name="name" value="<?= old('name') ?>" required
                                       class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                                       placeholder="Nama Lengkap">
                                <?php if(isset(session('errors')['name'])): ?>
                                    <p class="text-red-500 text-xs mt-1"><?= session('errors')['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Bisnis</label>
                                <input type="email" name="email" value="<?= old('email') ?>" required
                                       class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                                       placeholder="email@company.com">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nomor WhatsApp</label>
                                <input type="text" name="phone" value="<?= old('phone') ?>" required
                                       class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                                       placeholder="0812xxxxxx">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Layanan yang Dibutuhkan</label>
                                <select name="service_type" required class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition">
                                    <option value="">Pilih Layanan...</option>
                                    <option value="Mobile App" <?= $preselected_service == 'aplikasi-mobile' ? 'selected' : '' ?>>Mobile Application</option>
                                    <option value="Web Development" <?= $preselected_service == 'website-landing-page' ? 'selected' : '' ?>>Website Development</option>
                                    <option value="Enterprise System" <?= $preselected_service == 'sistem-informasi-erp' ? 'selected' : '' ?>>ERP / Enterprise System</option>
                                    <option value="UI/UX Design" <?= $preselected_service == 'ui-ux-design' ? 'selected' : '' ?>>UI/UX Design</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Detail Project</label>
                            <textarea name="project_detail" rows="5" required
                                      class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                                      placeholder="Ceritakan sedikit tentang project yang ingin Anda buat..."><?= old('project_detail') ?></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary-600 text-white font-bold py-5 rounded-2xl hover:bg-primary-700 transition shadow-2xl shadow-primary-200 flex items-center justify-center">
                            Kirim Inquiry Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        <!-- Google Maps (Contact) -->
        <?php if ($maps = get_setting('google_maps_iframe')): ?>
        <div class="mt-24 rounded-[3rem] overflow-hidden shadow-2xl border border-slate-100 h-[450px]">
            <?= $maps ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
