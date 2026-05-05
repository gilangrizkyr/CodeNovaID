<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<section class="pt-32 pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <!-- Product Images -->
            <div class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0">
                <div class="sticky top-24">
                    <div class="rounded-[2.5rem] overflow-hidden bg-slate-50 border border-slate-100 shadow-xl shadow-slate-200/50">
                        <img src="<?= $product->thumbnail ? base_url($product->thumbnail) : 'https://placehold.co/800x600' ?>" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="w-full lg:w-1/2 px-4">
                <div class="max-w-xl">
                    <nav class="flex mb-6 text-sm font-bold uppercase tracking-widest text-slate-400">
                        <a href="<?= base_url('produk') ?>" class="hover:text-primary-600">Shop</a>
                        <span class="mx-3">/</span>
                        <span class="text-slate-900"><?= $product->name ?></span>
                    </nav>

                    <h1 class="text-4xl md:text-5xl font-display font-extrabold text-slate-900 mb-6 leading-tight">
                        <?= $product->name ?>
                    </h1>

                    <div class="flex items-center mb-8">
                        <div class="flex text-orange-400 mr-3">
                            <?php for($i=0; $i<5; $i++): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <?php endfor; ?>
                        </div>
                        <span class="text-slate-500 font-semibold">(12+ Review Positif)</span>
                    </div>

                    <div class="bg-slate-50 p-8 rounded-3xl mb-10 border border-slate-100">
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-2">Harga Lisensi</p>
                        <div class="flex items-baseline">
                            <span class="text-4xl font-extrabold text-primary-600"><?= format_rupiah($product->price) ?></span>
                            <?php if($product->price_before): ?>
                                <span class="ml-4 text-xl text-slate-400 line-through font-bold"><?= format_rupiah($product->price_before) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="prose prose-slate max-w-none mb-12">
                        <?= $product->description ?>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php 
                            $wa_base = get_setting('whatsapp_business_url');
                            if (!$wa_base || !str_contains($wa_base, 'wa.me')) {
                                $wa_number = get_setting('company_whatsapp', '6281234567890');
                                $wa_base = "https://wa.me/{$wa_number}";
                            }
                            
                            $order_msg = urlencode("Halo CodeNova, saya tertarik untuk membeli produk: " . $product->name . " (ID: " . $product->id . ")");
                            $consult_msg = urlencode("Halo CodeNova, saya ingin konsultasi mengenai produk: " . $product->name);
                            
                            $order_link = str_contains($wa_base, '?') ? $wa_base . "&text=" . $order_msg : $wa_base . "?text=" . $order_msg;
                            $consult_link = str_contains($wa_base, '?') ? $wa_base . "&text=" . $consult_msg : $wa_base . "?text=" . $consult_msg;
                        ?>
                        <a href="<?= $order_link ?>" target="_blank" class="bg-primary-600 text-white text-center font-bold py-5 px-8 rounded-2xl hover:bg-primary-700 transition shadow-xl shadow-primary-100 flex items-center justify-center">
                            Beli Sekarang
                        </a>
                        <a href="<?= $consult_link ?>" target="_blank" class="bg-white text-slate-900 border border-slate-200 text-center font-bold py-5 px-8 rounded-2xl hover:bg-slate-50 transition flex items-center justify-center">
                            Konsultasi via WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
