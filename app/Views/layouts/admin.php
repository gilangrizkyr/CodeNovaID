<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?> | <?= get_setting('company_name', 'CodeNova') ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
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
        [x-cloak] { display: none !important; }
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.1); border-radius: 10px; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans" x-data="{ sidebarOpen: true }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-sm lg:hidden transition-opacity" x-cloak></div>

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 text-slate-300 transition-all duration-500 transform lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-between px-8 py-8">
                <span class="text-2xl font-display font-extrabold tracking-tight text-white">
                    CODE<span class="text-primary-500">NOVA</span>
                </span>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto sidebar-scroll">
                <p class="px-4 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">General</p>
                <a href="<?= base_url('admin/dashboard') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/dashboard*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-semibold text-sm">Dashboard</span>
                </a>

                <p class="px-4 pt-8 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Management</p>
                <a href="<?= base_url('admin/services') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/services*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold text-sm">Layanan Jasa</span>
                </a>
                <a href="<?= base_url('admin/portfolios') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/portfolios*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold text-sm">Portofolio</span>
                </a>
                <a href="<?= base_url('admin/shop/products') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/shop/products*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="font-semibold text-sm">Produk Digital</span>
                </a>
                <a href="<?= base_url('admin/blog/posts') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/blog*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4" />
                    </svg>
                    <span class="font-semibold text-sm">Blog Post</span>
                </a>

                <p class="px-4 pt-8 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Interactions</p>
                <a href="<?= base_url('admin/inquiries') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/inquiries*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold text-sm">Inquiry Pesan</span>
                </a>
                <a href="<?= base_url('admin/shop/orders') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/shop/orders*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-semibold text-sm">Order Penjualan</span>
                </a>

                <p class="px-4 pt-8 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Master Data</p>
                <a href="<?= base_url('admin/team') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/team*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="font-semibold text-sm">Data Tim</span>
                </a>
                <a href="<?= base_url('admin/clients') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/clients*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="font-semibold text-sm">Klien & Partner</span>
                </a>
                <a href="<?= base_url('admin/testimonials') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/testimonials*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="font-semibold text-sm">Testimoni</span>
                </a>

                <?php if (session()->get('role') === 'superadmin'): ?>
                <p class="px-4 pt-8 pb-2 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">System</p>
                <a href="<?= base_url('admin/settings') ?>" class="group flex items-center px-4 py-3 rounded-2xl transition-all hover:bg-slate-800 hover:text-white <?= url_is('admin/settings*') ? 'bg-primary-600 text-white shadow-lg shadow-primary-900/20' : '' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 opacity-70 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    </svg>
                    <span class="font-semibold text-sm">Pengaturan Web</span>
                </a>
                <?php endif; ?>
            </nav>

            <!-- User Footer -->
            <div class="p-6 bg-slate-950 border-t border-slate-800">
                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode(session()->get('name')) ?>&background=0e8ce9&color=fff" class="h-10 w-10 rounded-2xl border border-slate-700" alt="Avatar">
                    <div class="ml-4 overflow-hidden">
                        <p class="text-sm font-bold text-white truncate"><?= session()->get('name') ?></p>
                        <p class="text-[10px] text-slate-500 truncate capitalize font-bold tracking-wider"><?= session()->get('role') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-72 flex flex-col min-h-screen">
        <!-- Topbar -->
        <header class="glass-nav border-b border-slate-200 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="ml-4 flex items-center text-xs font-bold text-slate-400 uppercase tracking-widest">
                        <span class="hover:text-primary-600 transition-colors cursor-pointer">Console</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mx-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-slate-900"><?= $title ?? 'Dashboard' ?></span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <a href="<?= base_url() ?>" target="_blank" class="w-10 h-10 flex items-center justify-center text-slate-500 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all border border-transparent hover:border-primary-100" title="Lihat Website">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <div class="h-6 w-px bg-slate-200 mx-2"></div>
                    <a href="<?= base_url('admin/logout') ?>" class="flex items-center px-4 py-2 text-sm font-bold text-slate-600 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-8 flex-1">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-8 p-4 bg-green-50 border border-green-100 text-green-700 flex items-center shadow-sm rounded-2xl">
                    <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center text-white mr-4 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="font-bold"><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-8 p-4 bg-red-50 border border-red-100 text-red-700 flex items-center shadow-sm rounded-2xl">
                    <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center text-white mr-4 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="font-bold"><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>

        <!-- Footer -->
        <footer class="p-8 bg-white border-t border-slate-200 text-slate-400 text-xs font-bold flex flex-col md:flex-row justify-between items-center uppercase tracking-widest">
            <p>&copy; <?= date('Y') ?> <?= get_setting('company_name', 'CodeNova') ?>. Control Panel v2.0</p>
            <p>Crafted for Excellence</p>
        </footer>
    </div>

</body>
</html>
