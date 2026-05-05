<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | <?= get_setting('company_name', 'CodeNova') ?></title>
    
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
</head>
<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <span class="text-3xl font-display font-extrabold tracking-tight text-primary-600">
                CODE<span class="text-slate-900">NOVA</span>
            </span>
            <p class="text-slate-500 mt-2">Panel Administrasi Sistem</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 p-8 border border-slate-100">
            <h2 class="text-xl font-bold text-slate-900 mb-6 text-center">Masuk ke Akun</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-6 p-3 bg-red-50 border border-red-100 text-red-600 text-sm rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-6 p-3 bg-green-50 border border-green-100 text-green-600 text-sm rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" value="<?= old('email') ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="admin@yourdomain.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="text-sm font-semibold text-slate-700">Password</label>
                        <a href="<?= base_url('admin/forgot-password') ?>" class="text-xs text-primary-600 hover:underline">Lupa Password?</a>
                    </div>
                    <input type="password" name="password" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 outline-none transition"
                           placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-primary-600 text-white font-bold py-3.5 rounded-xl hover:bg-primary-700 transition shadow-lg shadow-primary-200 transform active:scale-95">
                        Masuk Sekarang
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-slate-400 text-sm mt-8">
            &copy; <?= date('Y') ?> <?= get_setting('company_name', 'CodeNova') ?>
        </p>
    </div>

</body>
</html>
