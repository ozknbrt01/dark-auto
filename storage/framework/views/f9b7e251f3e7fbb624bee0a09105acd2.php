<?php $__env->startSection('title', 'Siparişiniz Alındı! - OtoMarket'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">

    <!-- Başarı Kartı -->
    <div class="bg-[#12192b]/90 border border-emerald-500/40 rounded-3xl p-8 sm:p-10 text-center relative overflow-hidden backdrop-blur-md shadow-2xl shadow-emerald-500/10">
        
        <div class="w-20 h-20 rounded-3xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-4xl mx-auto mb-6 shadow-lg shadow-emerald-500/20">
            ✓
        </div>

        <span class="bg-emerald-500/20 text-emerald-300 text-xs font-bold px-3 py-1 rounded-full border border-emerald-500/30 inline-block mb-3">
            Siparişiniz Başarıyla Oluşturuldu
        </span>

        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-2">
            Teşekkürler, <?php echo e($order->customer_name); ?>!
        </h1>

        <p class="text-sm text-slate-300 max-w-md mx-auto mb-6">
            Siparişiniz alındı ve ilgili satıcılarımıza iletildi. Parçalarınız en kısa sürede kargoya verilecektir.
        </p>

        <div class="inline-flex items-center gap-3 bg-[#18233c] border border-slate-700 px-5 py-2.5 rounded-2xl text-sm font-mono text-slate-200">
            <span class="text-slate-400 font-sans text-xs">Sipariş Takip No:</span>
            <strong class="text-amber-400 text-base font-bold"><?php echo e($order->order_number); ?></strong>
        </div>

    </div>

    <!-- Sipariş Detayları & Satıcı Dağılımı -->
    <div class="bg-[#12192b]/80 border border-slate-800 rounded-3xl p-6 sm:p-8 space-y-6">
        <h3 class="text-base font-bold text-white border-b border-slate-800 pb-4 flex items-center justify-between">
            <span>Sipariş Özeti</span>
            <span class="text-xs font-bold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 rounded-lg">
                Durum: Onay Bekliyor (Pending)
            </span>
        </h3>

        <div class="divide-y divide-slate-800/80">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-lg flex-shrink-0">
                            ⚙️
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded">
                                    OEM: <?php echo e($item->product?->oem_code ?? 'OEM'); ?>

                                </span>
                                <span class="text-xs text-slate-400 font-medium">
                                    🏪 Satıcı: <?php echo e($item->vendor?->store_name ?? 'Satıcı'); ?>

                                </span>
                            </div>
                            <h4 class="text-sm font-bold text-white mt-1"><?php echo e($item->product_name ?? $item->product?->title); ?></h4>
                            <p class="text-xs text-slate-400 font-mono">SKU: <?php echo e($item->sku ?? $item->product?->sku); ?></p>
                        </div>
                    </div>

                    <div class="text-right sm:self-center">
                        <span class="text-sm font-bold text-amber-400 font-mono block">
                            ₺<?php echo e(number_format($item->total_price, 2, ',', '.')); ?>

                        </span>
                        <span class="text-xs text-slate-400 block">
                            <?php echo e($item->quantity); ?> adet x ₺<?php echo e(number_format($item->unit_price, 2, ',', '.')); ?>

                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="pt-4 border-t border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#162035]/60 p-4 rounded-2xl">
            <div>
                <span class="text-xs text-slate-400 block">Teslimat Adresi</span>
                <p class="text-xs text-slate-200 mt-0.5"><?php echo e($order->shipping_address); ?></p>
            </div>

            <div class="text-right flex-shrink-0">
                <span class="text-xs text-slate-400 block">Genel Toplam</span>
                <span class="text-2xl font-black text-amber-400 font-mono">
                    ₺<?php echo e(number_format($order->total_amount, 2, ',', '.')); ?>

                </span>
            </div>
        </div>

        <div class="pt-4 flex justify-center gap-4">
            <a href="/" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-6 py-3 rounded-xl transition shadow-md shadow-blue-500/20">
                Alışverişe Devam Et
            </a>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.store', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\YBG\.gemini\antigravity-ide\scratch\auto-marketplace\resources\views/order-success.blade.php ENDPATH**/ ?>