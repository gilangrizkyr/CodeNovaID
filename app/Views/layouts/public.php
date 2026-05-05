<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= \App\Libraries\SeoHelper::generateMeta($seo ?? []) ?>

    <?php if ($favicon = get_setting('company_favicon')): ?>
        <link rel="icon" type="image/png" href="<?= base_url($favicon) ?>">
    <?php endif; ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            200: '#bae0fd',
                            300: '#7cc7fb',
                            400: '#38aaf7',
                            500: '#0e8ce9',
                            600: '#026ec7',
                            700: '#0358a1',
                            800: '#074b84',
                            900: '#0c3f6e',
                            950: '#082849',
                        },
                        secondary: '#FF6B00',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Running Logo Animation */
        @keyframes scroll-running {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            display: flex;
            width: max-content;
            animation: scroll-running 30s linear infinite;
        }

        .animate-scroll:hover {
            animation-play-state: paused;
        }

        /* Horizontal Scroll Styling */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Google Analytics (Integration) -->
    <?php if ($ga_id = get_setting('google_analytics_id')): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $ga_id ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', '<?= $ga_id ?>');
        </script>
    <?php endif; ?>

    <!-- Google Tag Manager (Integration) -->
    <?php if ($gtm_id = get_setting('google_tag_manager_id')): ?>
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || []; w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                }); var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?= $gtm_id ?>');</script>
    <?php endif; ?>

    <!-- Facebook Pixel (Integration) -->
    <?php if ($fb_pixel = get_setting('facebook_pixel_id')): ?>
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return; n = f.fbq = function () {
                    n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
                n.queue = []; t = b.createElement(e); t.async = !0;
                t.src = v; s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?= $fb_pixel ?>');
            fbq('track', 'Pageview');
        </script>
    <?php endif; ?>
</head>

<body class="bg-slate-50 text-slate-900 font-sans" x-data="{ mobileMenu: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Promo Banner (Promo) -->
    <?php if (get_setting('promo_enabled', '0') == '1'): ?>
        <div class="py-2.5 px-4 text-center text-white text-xs md:text-sm font-bold tracking-wide relative z-[60]"
            style="background-color: <?= get_setting('promo_banner_color', '#0e8ce9') ?>">
            <?= get_setting('promo_text', 'Dapatkan penawaran menarik hari ini!') ?>
            <?php if ($promo_url = get_setting('promo_link_url')): ?>
                <a href="<?= $promo_url ?>"
                    class="ml-2 underline hover:text-white/80 transition"><?= get_setting('promo_link_text', 'Cek Sekarang') ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
        :class="scrolled ? 'glass py-3 shadow-lg' : 'bg-transparent py-5'"
        :style="scrolled ? '' : 'top: <?= get_setting('promo_enabled', '0') == '1' ? '40px' : '0' ?>'">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="<?= base_url() ?>" class="flex items-center space-x-2">
                <?php if ($logo = get_setting('company_logo')): ?>
                    <img src="<?= base_url($logo) ?>" alt="<?= get_setting('company_name') ?>" class="h-8 w-auto">
                <?php else: ?>
                    <span class="text-2xl font-display font-extrabold tracking-tight text-primary-600">
                        CODE<span class="text-secondary">NOVA</span>
                    </span>
                <?php endif; ?>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 font-medium">
                <a href="<?= base_url() ?>"
                    class="transition <?= url_is('/') ? 'text-primary-600 font-bold' : 'hover:text-primary-600' ?>">Beranda</a>
                <a href="<?= base_url('services') ?>"
                    class="transition <?= url_is('services*') ? 'text-primary-600 font-bold' : 'hover:text-primary-600' ?>">Layanan</a>
                <a href="<?= base_url('portfolio') ?>"
                    class="transition <?= url_is('portfolio*') ? 'text-primary-600 font-bold' : 'hover:text-primary-600' ?>">Portofolio</a>
                <a href="<?= base_url('blog') ?>"
                    class="transition <?= url_is('blog*') ? 'text-primary-600 font-bold' : 'hover:text-primary-600' ?>">Blog</a>
                <a href="<?= base_url('produk') ?>"
                    class="transition <?= url_is('produk*') ? 'text-primary-600 font-bold' : 'hover:text-primary-600' ?>">Produk</a>
                <a href="<?= base_url('kontak') ?>"
                    class="bg-primary-600 text-white px-6 py-2.5 rounded-full hover:bg-primary-700 transition shadow-lg shadow-primary-200">
                    Mulai Project
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden text-slate-900">
                <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg x-show="mobileMenu" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="md:hidden absolute top-full left-0 w-full bg-white border-b border-slate-100 p-4 shadow-xl">
            <div class="flex flex-col space-y-4 font-medium">
                <a href="<?= base_url() ?>"
                    class="p-2 rounded <?= url_is('/') ? 'bg-primary-50 text-primary-600 font-bold' : 'hover:bg-slate-50' ?>">Beranda</a>
                <a href="<?= base_url('services') ?>"
                    class="p-2 rounded <?= url_is('services*') ? 'bg-primary-50 text-primary-600 font-bold' : 'hover:bg-slate-50' ?>">Layanan</a>
                <a href="<?= base_url('portfolio') ?>"
                    class="p-2 rounded <?= url_is('portfolio*') ? 'bg-primary-50 text-primary-600 font-bold' : 'hover:bg-slate-50' ?>">Portofolio</a>
                <a href="<?= base_url('blog') ?>"
                    class="p-2 rounded <?= url_is('blog*') ? 'bg-primary-50 text-primary-600 font-bold' : 'hover:bg-slate-50' ?>">Blog</a>
                <a href="<?= base_url('produk') ?>"
                    class="p-2 rounded <?= url_is('produk*') ? 'bg-primary-50 text-primary-600 font-bold' : 'hover:bg-slate-50' ?>">Produk</a>
                <a href="<?= base_url('kontak') ?>"
                    class="p-3 bg-primary-600 text-white text-center rounded-xl font-bold">Mulai Project</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen <?= get_setting('promo_enabled', '0') == '1' ? 'pt-28' : 'pt-20' ?>">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 pt-20 pb-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <a href="<?= base_url() ?>" class="mb-6 block">
                        <?php
                        $logo_dark = get_setting('company_logo_dark');
                        $logo_main = get_setting('company_logo');
                        $display_logo = $logo_dark ?: $logo_main;
                        ?>
                        <?php if ($display_logo): ?>
                            <img src="<?= base_url($display_logo) ?>" alt="<?= get_setting('company_name') ?>"
                                class="h-8 w-auto <?= $logo_dark ? '' : 'brightness-0 invert' ?>">
                        <?php else: ?>
                            <span class="text-2xl font-display font-extrabold tracking-tight text-white">
                                CODE<span class="text-secondary">NOVA</span>
                            </span>
                        <?php endif; ?>
                    </a>
                    <p class="mb-6 leading-relaxed">
                        <?= get_setting('footer_tagline', 'Solusi teknologi terdepan untuk transformasi digital bisnis Anda.') ?>
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <?php if ($instagram = get_setting('instagram_url')): ?>
                            <a href="<?= $instagram ?>" target="_blank"
                                class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($facebook = get_setting('facebook_url')): ?>
                            <a href="<?= $facebook ?>" target="_blank"
                                class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($linkedin = get_setting('linkedin_url')): ?>
                            <a href="<?= $linkedin ?>" target="_blank"
                                class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Layanan</h4>
                    <ul class="space-y-4">
                        <?php
                        $footerServices = (new \App\Models\ServiceModel())->where('is_active', 1)->orderBy('sort_order', 'ASC')->limit(5)->findAll();
                        foreach ($footerServices as $fs):
                            ?>
                            <li><a href="<?= base_url('services/' . $fs->slug) ?>"
                                    class="hover:text-white transition"><?= $fs->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Perusahaan</h4>
                    <ul class="space-y-4">
                        <li><a href="<?= base_url() ?>#tentang" class="hover:text-white transition">Tentang Kami</a>
                        </li>
                        <li><a href="<?= base_url('portfolio') ?>" class="hover:text-white transition">Portofolio</a>
                        </li>
                        <li><a href="<?= base_url('blog') ?>" class="hover:text-white transition">Blog & Berita</a></li>
                        <li><a href="<?= base_url('kontak') ?>" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span><?= get_setting('company_address') ?></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span><?= get_setting('company_email') ?></span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-6">Newsletter</h4>
                    <p class="text-sm mb-6 leading-relaxed">Berlangganan untuk mendapatkan info teknologi terbaru.</p>
                    <form action="<?= base_url('newsletter/subscribe') ?>" method="POST" class="flex">
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-2 bg-slate-800 border border-slate-700 rounded-l-xl focus:outline-none focus:border-primary-500 text-white text-sm"
                            required>
                        <button type="submit"
                            class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-r-xl transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p><?= get_setting('footer_copyright') ?></p>
                <div class="flex flex-wrap gap-4 mt-4 md:mt-0">
                    <?php if ($instagram = get_setting('instagram_url')): ?>
                        <a href="<?= $instagram ?>" target="_blank" class="hover:text-white transition"
                            title="Instagram">Instagram</a>
                    <?php endif; ?>
                    <?php if ($linkedin = get_setting('linkedin_url')): ?>
                        <a href="<?= $linkedin ?>" target="_blank" class="hover:text-white transition"
                            title="LinkedIn">LinkedIn</a>
                    <?php endif; ?>
                    <?php if ($facebook = get_setting('facebook_url')): ?>
                        <a href="<?= $facebook ?>" target="_blank" class="hover:text-white transition"
                            title="Facebook">Facebook</a>
                    <?php endif; ?>
                    <?php if ($twitter = get_setting('twitter_url')): ?>
                        <a href="<?= $twitter ?>" target="_blank" class="hover:text-white transition"
                            title="Twitter">Twitter</a>
                    <?php endif; ?>
                    <?php if ($youtube = get_setting('youtube_url')): ?>
                        <a href="<?= $youtube ?>" target="_blank" class="hover:text-white transition"
                            title="YouTube">YouTube</a>
                    <?php endif; ?>
                    <?php if ($github = get_setting('github_url')): ?>
                        <a href="<?= $github ?>" target="_blank" class="hover:text-white transition"
                            title="GitHub">GitHub</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WA -->
    <?php
    $wa_url = get_setting('whatsapp_business_url');
    if (!$wa_url) {
        $wa_number = get_setting('company_whatsapp');
        $wa_url = $wa_number ? "https://wa.me/{$wa_number}" : "#";
    }
    ?>
    <a href="<?= $wa_url ?>" target="_blank"
        class="fixed bottom-8 right-8 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition-all hover:scale-110 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.316 1.592 5.43 0 9.856-4.426 9.858-9.855.002-5.43-4.425-9.856-9.853-9.856-5.431 0-9.856 4.426-9.858 9.855-.001 1.938.529 3.756 1.534 5.233l-1.007 3.676 3.778-.991zm10.744-7.061c-.303-.151-1.788-.882-2.064-.983-.277-.101-.478-.151-.678.151-.201.302-.779.983-.955 1.183-.176.201-.352.227-.655.076-.303-.151-1.281-.472-2.441-1.506-.902-.804-1.51-1.797-1.687-2.099-.176-.302-.019-.465.132-.615.136-.135.303-.353.454-.529.151-.177.202-.303.303-.505.101-.202.05-.378-.026-.529-.076-.151-.678-1.636-.93-2.241-.244-.59-.493-.51-.678-.519-.174-.01-.374-.012-.574-.012-.201 0-.528.076-.804.378-.276.302-1.056 1.034-1.056 2.522s1.081 2.923 1.232 3.124c.151.202 2.127 3.248 5.153 4.555.72.311 1.282.497 1.721.637.722.23 1.379.197 1.9.12.58-.087 1.788-.731 2.039-1.437.252-.706.252-1.31.176-1.437-.076-.127-.277-.202-.58-.353z" />
        </svg>
    </a>

</body>

</html>