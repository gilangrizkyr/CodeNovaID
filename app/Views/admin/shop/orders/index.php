<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8">
    <h2 class="text-2xl font-bold text-slate-900">Manajemen Pesanan</h2>
    <p class="text-slate-500 text-sm mt-1">Pantau dan kelola semua pesanan produk dari pelanggan.</p>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Order #</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Pelanggan</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Total</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Status Pesanan</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100">Status Bayar</th>
                    <th class="px-6 py-4 font-semibold border-b border-slate-100 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400 italic">Belum ada pesanan masuk.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($orders as $order): ?>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-6 py-4 font-bold text-slate-900">
                            #<?= $order->order_number ?>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-900"><?= $order->customer_name ?></p>
                            <p class="text-xs text-slate-500"><?= date('d M Y, H:i', strtotime($order->created_at)) ?></p>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-700">
                            <?= format_rupiah($order->total_amount) ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php
                            $statusClasses = [
                                'pending'    => 'bg-amber-50 text-amber-600',
                                'confirmed'  => 'bg-blue-50 text-blue-600',
                                'processing' => 'bg-indigo-50 text-indigo-600',
                                'shipped'    => 'bg-purple-50 text-purple-600',
                                'delivered'  => 'bg-green-50 text-green-600',
                                'cancelled'  => 'bg-red-50 text-red-600',
                            ];
                            $class = $statusClasses[$order->status] ?? 'bg-slate-50 text-slate-600';
                            ?>
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider <?= $class ?>">
                                <?= $order->status ?>
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider 
                                <?= $order->payment_status === 'paid' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?>">
                                <?= $order->payment_status ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?= base_url('admin/shop/orders/view/'.$order->id) ?>" class="inline-flex items-center px-3 py-1.5 bg-slate-50 text-slate-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg text-xs font-bold transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
