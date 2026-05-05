<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Header Section -->
<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Dashboard Overview</h2>
        <p class="text-slate-500 text-sm mt-1">Pantau performa bisnis dan aktivitas terbaru CodeNova.</p>
    </div>
    <div class="flex items-center space-x-3">
        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">
            <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
            System Online
        </span>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="group bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-primary-100 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-primary-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Services</span>
        </div>
        <p class="text-sm font-medium text-slate-500">Layanan Aktif</p>
        <h3 class="text-3xl font-extrabold text-slate-900 mt-1"><?= $stats['services'] ?></h3>
    </div>

    <div class="group bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-primary-100 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl group-hover:bg-primary-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Work</span>
        </div>
        <p class="text-sm font-medium text-slate-500">Proyek Portofolio</p>
        <h3 class="text-3xl font-extrabold text-slate-900 mt-1"><?= $stats['portfolios'] ?></h3>
    </div>

    <div class="group bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-primary-100 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-orange-50 text-orange-600 rounded-2xl group-hover:bg-primary-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Leads</span>
        </div>
        <p class="text-sm font-medium text-slate-500">Inquiry Baru</p>
        <h3 class="text-3xl font-extrabold text-slate-900 mt-1"><?= $stats['inquiries'] ?></h3>
    </div>

    <div class="group bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-primary-100 transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-2xl group-hover:bg-primary-600 group-hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4" />
                </svg>
            </div>
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Content</span>
        </div>
        <p class="text-sm font-medium text-slate-500">Artikel Blog</p>
        <h3 class="text-3xl font-extrabold text-slate-900 mt-1"><?= $stats['blog_posts'] ?></h3>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Charts Section -->
    <div class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h3 class="font-bold text-slate-900 text-lg">Statistik Interaksi</h3>
                <p class="text-xs text-slate-500">Tren inquiry pelanggan dalam 7 hari terakhir.</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-primary-500 rounded-full"></div>
                <span class="text-xs font-bold text-slate-700">Inquiries</span>
            </div>
        </div>
        <div class="h-[350px] relative">
            <canvas id="inquiryChart"></canvas>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
        <h3 class="font-bold text-slate-900 text-lg mb-6">Aksi Cepat</h3>
        <div class="space-y-4">
            <a href="<?= base_url('admin/services/new') ?>" class="flex items-center p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition group">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-primary-500 group-hover:text-white transition shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="font-bold text-slate-900 text-sm">Tambah Layanan</p>
                    <p class="text-[10px] text-slate-500">Buat katalog jasa baru</p>
                </div>
            </a>

            <a href="<?= base_url('admin/blog/posts/new') ?>" class="flex items-center p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition group">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-primary-500 group-hover:text-white transition shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="font-bold text-slate-900 text-sm">Tulis Artikel</p>
                    <p class="text-[10px] text-slate-500">Update konten edukasi</p>
                </div>
            </a>

            <a href="<?= base_url('admin/portfolios/new') ?>" class="flex items-center p-4 bg-slate-50 rounded-2xl border border-slate-100 hover:border-primary-300 hover:bg-primary-50 transition group">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-primary-500 group-hover:text-white transition shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="font-bold text-slate-900 text-sm">Upload Portofolio</p>
                    <p class="text-[10px] text-slate-500">Pamerkan hasil kerja</p>
                </div>
            </a>
            
            <div class="pt-6 border-t border-slate-100 mt-6">
                <div class="p-4 bg-primary-50 rounded-2xl border border-primary-100 flex items-center">
                    <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-primary-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-bold text-primary-700">Butuh Bantuan?</p>
                        <p class="text-[10px] text-primary-600 mt-0.5">Dokumentasi sistem sudah tersedia di menu bantuan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10">
    <!-- Recent Inquiries -->
    <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-bold text-slate-900 text-lg">Inquiry Terbaru</h3>
            <a href="<?= base_url('admin/inquiries') ?>" class="text-xs font-bold text-primary-600 hover:text-primary-700 tracking-wider uppercase bg-primary-50 px-3 py-1.5 rounded-lg transition-colors">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 text-[10px] uppercase tracking-[0.2em]">
                    <tr>
                        <th class="px-8 py-4 font-bold">Klien</th>
                        <th class="px-8 py-4 font-bold">Layanan</th>
                        <th class="px-8 py-4 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php if (empty($stats['recent_inquiries'])): ?>
                        <tr>
                            <td colspan="3" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <p class="text-sm text-slate-400 font-medium italic">Belum ada inquiry masuk.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($stats['recent_inquiries'] as $inquiry): ?>
                        <tr class="hover:bg-slate-50 transition group">
                            <td class="px-8 py-5">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-primary-50 text-primary-600 flex items-center justify-center font-bold text-sm border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                                        <?= substr($inquiry->name, 0, 1) ?>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-bold text-slate-900 text-sm leading-tight"><?= $inquiry->name ?></p>
                                        <p class="text-xs text-slate-400 mt-0.5"><?= $inquiry->email ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm font-medium text-slate-600"><?= $inquiry->service_type ?></span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 text-[10px] font-bold rounded-full uppercase tracking-widest
                                    <?= $inquiry->status === 'new' ? 'bg-blue-50 text-blue-600 border border-blue-100' : 'bg-slate-50 text-slate-500 border border-slate-100' ?>">
                                    <?= ucfirst($inquiry->status) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Activity Log -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100">
            <h3 class="font-bold text-slate-900 text-lg">Aktivitas Sistem</h3>
        </div>
        <div class="p-8">
            <div class="relative space-y-8 before:absolute before:left-[15px] before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-100">
                <?php foreach($stats['recent_activities'] as $log): ?>
                <div class="relative flex items-start pl-10">
                    <div class="absolute left-0 top-0 h-8 w-8 rounded-full bg-white border-2 border-primary-500 flex items-center justify-center z-10 shadow-sm">
                        <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-slate-900 leading-snug">
                            <span class="font-bold"><?= $log->admin_name ?></span> 
                            <span class="text-slate-600"><?= $log->description ?></span>
                        </p>
                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-[0.1em]">
                            <?= date('d M Y, H:i', strtotime($log->created_at)) ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('inquiryChart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(14, 140, 233, 0.2)');
        gradient.addColorStop(1, 'rgba(14, 140, 233, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Inquiries',
                    data: [12, 19, 13, 15, 22, 10, 15],
                    borderColor: '#0e8ce9',
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    borderWidth: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#0e8ce9',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHoverBorderWidth: 4,
                    pointHoverBackgroundColor: '#0e8ce9'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleFont: { size: 12, weight: 'bold' },
                        bodyFont: { size: 12 },
                        padding: 12,
                        cornerRadius: 12,
                        displayColors: false
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#f1f5f9', drawBorder: false },
                        ticks: { font: { size: 11 }, color: '#64748b' }
                    },
                    x: { 
                        grid: { display: false, drawBorder: false },
                        ticks: { font: { size: 11 }, color: '#64748b' }
                    }
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>
