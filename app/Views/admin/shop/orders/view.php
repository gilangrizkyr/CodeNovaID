<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">
    <div>
        <div class="flex items-center space-x-3 mb-2">
            <h2 class="text-2xl font-bold text-slate-900">Pesanan #<?= $order->order_number ?></h2>
            <span class="px-3 py-1 bg-primary-50 text-primary-600 text-xs font-bold rounded-full uppercase tracking-widest">
                <?= $order->status ?>
            </span>
        </div>
        <p class="text-slate-500 text-sm">Dipesan pada <?= date('d F Y, H:i', strtotime($order->created_at)) ?></p>
    </div>
    <a href="<?= base_url('admin/shop/orders') ?>" class="text-sm font-bold text-slate-500 hover:text-primary-600 transition flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Info -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Status Management -->
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-6">Kelola Status Pesanan</h3>
            <form action="<?= base_url('admin/shop/orders/update-status/'.$order->id) ?>" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Status Pengiriman</label>
                    <select name="status" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 outline-none transition">
                        <option value="pending" <?= $order->status === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="confirmed" <?= $order->status === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                        <option value="processing" <?= $order->status === 'processing' ? 'selected' : '' ?>>Processing</option>
                        <option value="shipped" <?= $order->status === 'shipped' ? 'selected' : '' ?>>Shipped</option>
                        <option value="delivered" <?= $order->status === 'delivered' ? 'selected' : '' ?>>Delivered</option>
                        <option value="cancelled" <?= $order->status === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Status Pembayaran</label>
                    <select name="payment_status" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-primary-500 outline-none transition">
                        <option value="unpaid" <?= $order->payment_status === 'unpaid' ? 'selected' : '' ?>>Unpaid</option>
                        <option value="partial" <?= $order->payment_status === 'partial' ? 'selected' : '' ?>>Partial</option>
                        <option value="paid" <?= $order->payment_status === 'paid' ? 'selected' : '' ?>>Paid</option>
                        <option value="refunded" <?= $order->payment_status === 'refunded' ? 'selected' : '' ?>>Refunded</option>
                    </select>
                </div>
                <div class="md:col-span-2 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 transition shadow-lg">
                        Update Status
                    </button>
                </div>
            </form>
        </div>

        <!-- Customer Details -->
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-6">Detail Pelanggan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Nama Lengkap</p>
                    <p class="text-slate-900 font-medium"><?= $order->customer_name ?></p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Email</p>
                    <p class="text-slate-900 font-medium"><?= $order->customer_email ?></p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Nomor Telepon</p>
                    <p class="text-slate-900 font-medium"><?= $order->customer_phone ?></p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Perusahaan</p>
                    <p class="text-slate-900 font-medium"><?= $order->customer_company ?? '-' ?></p>
                </div>
            </div>
        </div>

        <!-- Shipping Info -->
        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-6">Alamat Pengiriman</h3>
            <div class="space-y-4">
                <p class="text-slate-600 leading-relaxed"><?= nl2br($order->shipping_address ?? 'Tidak ada alamat.') ?></p>
                <div class="grid grid-cols-3 gap-4 border-t border-slate-50 pt-4">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kota</p>
                        <p class="text-slate-900 font-medium"><?= $order->shipping_city ?? '-' ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Provinsi</p>
                        <p class="text-slate-900 font-medium"><?= $order->shipping_province ?? '-' ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kode Pos</p>
                        <p class="text-slate-900 font-medium"><?= $order->shipping_postal ?? '-' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar / Totals -->
    <div class="space-y-8">
        <div class="bg-slate-900 p-8 rounded-3xl text-white shadow-xl">
            <h3 class="font-bold mb-6 flex items-center text-primary-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                Ringkasan Biaya
            </h3>
            <div class="space-y-4">
                <div class="flex justify-between text-sm">
                    <span class="text-slate-400">Subtotal</span>
                    <span class="font-bold"><?= format_rupiah($order->subtotal) ?></span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-400">Ongkos Kirim</span>
                    <span class="font-bold"><?= format_rupiah($order->shipping_cost) ?></span>
                </div>
                <?php if ($order->discount_amount > 0): ?>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-400">Diskon</span>
                    <span class="font-bold text-red-400">- <?= format_rupiah($order->discount_amount) ?></span>
                </div>
                <?php endif; ?>
                <div class="pt-4 border-t border-white/10 flex justify-between items-end">
                    <span class="text-sm text-slate-400 font-medium">Total Bayar</span>
                    <span class="text-2xl font-display font-extrabold text-primary-400"><?= format_rupiah($order->total_amount) ?></span>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-6">Info Pembayaran</h3>
            <div class="space-y-6">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Metode</p>
                    <p class="text-slate-900 font-medium"><?= $order->payment_method ?? 'Belum ditentukan' ?></p>
                </div>
                <?php if ($order->payment_proof): ?>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Bukti Transfer</p>
                    <a href="<?= base_url('uploads/payments/'.$order->payment_proof) ?>" target="_blank" class="block rounded-xl overflow-hidden border border-slate-100 group">
                        <img src="<?= base_url('uploads/payments/'.$order->payment_proof) ?>" class="w-full h-auto group-hover:scale-105 transition duration-500">
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
