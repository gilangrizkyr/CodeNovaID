<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Sedang Dalam Perbaikan | CodeNova</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            600: '#0e8ce9',
                            700: '#026ec7',
                        },
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4 font-sans">
    <div class="max-w-lg w-full text-center">
        <div class="mb-10 inline-flex items-center justify-center w-24 h-24 bg-primary-100 text-primary-600 rounded-[2rem] animate-bounce shadow-xl shadow-primary-200/50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <h1 class="text-4xl font-extrabold text-slate-900 mb-6">Kembali Segera!</h1>
        <p class="text-lg text-slate-500 mb-10 leading-relaxed">Kami sedang melakukan pemeliharaan rutin untuk meningkatkan layanan kami. Mohon maaf atas ketidaknyamanannya.</p>
        
        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50">
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Butuh Bantuan Mendesak?</p>
            <div class="flex flex-col space-y-3">
                <a href="mailto:<?= get_setting('company_email') ?>" class="text-primary-600 font-bold hover:underline"><?= get_setting('company_email') ?></a>
                <a href="https://wa.me/<?= get_setting('company_phone') ?>" class="text-slate-900 font-bold hover:underline"><?= get_setting('company_phone') ?></a>
            </div>
        </div>
        
        <p class="mt-12 text-slate-400 text-sm italic">&copy; <?= date('Y') ?> <?= get_setting('company_name') ?>. All rights reserved.</p>
    </div>
</body>
</html>
