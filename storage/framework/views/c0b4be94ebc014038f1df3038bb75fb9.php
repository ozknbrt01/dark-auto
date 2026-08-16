<?php $__env->startSection('title', 'Arama Sonuçları - OtoMarket'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb Navigasyon -->
    <nav class="flex items-center gap-2 text-xs text-slate-400">
        <a href="/" class="hover:text-white transition">Ana Sayfa</a>
        <span>/</span>
        <span class="text-slate-200 font-medium">Arama Sonuçları</span>
    </nav>

    <!-- Aktif Filtre & Araç Bilgi Başlığı -->
    <div class="bg-[#12192b]/90 border border-slate-800/90 rounded-2xl p-6 relative overflow-hidden backdrop-blur-md">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <div class="space-y-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVehicle): ?>
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="bg-emerald-500/20 text-emerald-300 text-xs font-bold px-2.5 py-0.5 rounded-full border border-emerald-500/30 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                            Araç Uyumluluk Filtresi Aktif
                        </span>
                        <span class="text-xs text-slate-400 font-mono">Vehicle ID: #<?php echo e($selectedVehicle->id); ?></span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                        <?php echo e($selectedVehicle->make); ?> <?php echo e($selectedVehicle->model); ?> <?php echo e($selectedVehicle->generation); ?>

                        <span class="text-slate-400 font-normal">(<?php echo e($selectedVehicle->year_from); ?> - <?php echo e($selectedVehicle->year_to ?? 'Günümüz'); ?>)</span>
                    </h1>
                    
                    <p class="text-xs sm:text-sm text-amber-400 font-medium flex items-center gap-2">
                        <span>Motor: <?php echo e($selectedVehicle->engine ?? 'Standart'); ?></span>
                        <span class="text-slate-600">•</span>
                        <span class="text-slate-300">Bu araca özel <?php echo e($products->total()); ?> uyumlu parça bulundu.</span>
                    </p>
                <?php elseif(!empty($searchTerm)): ?>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                        "<span class="text-amber-400"><?php echo e($searchTerm); ?></span>" İçin Arama Sonuçları
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-400">
                        OEM kodu, parça adı veya stok koduna göre <?php echo e($products->total()); ?> sonuç listeleniyor.
                    </p>
                <?php else: ?>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Tüm Yedek Parçalar</h1>
                    <p class="text-xs sm:text-sm text-slate-400">Pazaryerimizde listelenen <?php echo e($products->total()); ?> aktif parça.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Filtre Temizle / Değiştir Butonu -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVehicle || !empty($searchTerm)): ?>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <a href="<?php echo e(route('products.search')); ?>" class="text-xs font-semibold text-slate-300 hover:text-white bg-slate-800/80 hover:bg-slate-700 border border-slate-700/80 px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>Filtreleri Temizle</span>
                    </a>

                    <a href="/#vehicle-selector" class="text-xs font-semibold text-slate-950 bg-amber-400 hover:bg-amber-300 px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 shadow-md shadow-amber-400/20">
                        <span>🚗 Farklı Araç Seç</span>
                    </a>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>

    <!-- Ürün Listeleme Izgarası (Grid) -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($products->isNotEmpty()): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-[#12192b]/90 border border-slate-800/80 hover:border-blue-500/50 rounded-2xl p-5 transition-all duration-200 flex flex-col justify-between group shadow-lg shadow-black/20 hover:shadow-blue-500/10">
                    
                    <!-- Ürün Başlık & Etiketler -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="text-xs font-mono font-bold bg-blue-500/10 text-blue-400 px-2.5 py-1 rounded-lg border border-blue-500/20 flex items-center gap-1">
                                <span class="text-[10px] text-slate-400 font-sans">OEM:</span>
                                <span><?php echo e($product->oem_code); ?></span>
                            </span>

                            <span class="text-[11px] text-slate-400 truncate max-w-[120px]" title="<?php echo e($product->vendor?->store_name); ?>">
                                🏪 <?php echo e($product->vendor?->store_name ?? 'Yetkili Satıcı'); ?>

                            </span>
                        </div>

                        <!-- Ürün Görsel Placeholder -->
                        <div class="w-full h-36 bg-[#162035] rounded-xl mb-4 flex items-center justify-center text-slate-600 border border-slate-800/60 group-hover:border-slate-700/80 transition relative overflow-hidden">
                            <span class="text-4xl group-hover:scale-110 transition duration-300">⚙️</span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->is_universal): ?>
                                <span class="absolute top-2 left-2 bg-purple-500/20 text-purple-300 text-[10px] font-bold px-2 py-0.5 rounded border border-purple-500/30">
                                    Evrensel Parça
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <h3 class="text-sm font-bold text-white group-hover:text-blue-400 transition line-clamp-2 leading-snug">
                            <?php echo e($product->title); ?>

                        </h3>

                        <div class="mt-2 flex items-center justify-between text-xs text-slate-400 font-mono">
                            <span>SKU: <?php echo e($product->sku); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->stock_quantity > 0): ?>
                                <span class="text-emerald-400 font-sans text-[11px] flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Stokta Var
                                </span>
                            <?php else: ?>
                                <span class="text-rose-400 font-sans text-[11px]">Tükendi</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <!-- Fiyat ve Sepete Ekle Butonu -->
                    <div class="mt-5 pt-4 border-t border-slate-800/80">
                        <div class="flex items-baseline justify-between mb-3">
                            <span class="text-xs text-slate-400">Birim Fiyat</span>
                            <span class="text-xl font-black text-amber-400 font-mono">
                                ₺<?php echo e(number_format($product->price, 2, ',', '.')); ?>

                            </span>
                        </div>

                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('add-to-cart-button', ['productId' => $product->id]);

$__key = 'prod-search-' . $product->id;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3586366055-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Sayfalama (Pagination) -->
        <div class="pt-6">
            <?php echo e($products->links()); ?>

        </div>
    <?php else: ?>
        <!-- Sonuç Bulunamadı Kartı -->
        <div class="bg-[#12192b]/60 border border-dashed border-slate-800 rounded-3xl p-12 text-center max-w-2xl mx-auto space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center text-3xl mx-auto">
                🔍
            </div>
            
            <h3 class="text-lg font-bold text-white">Aradığınız Kriterlere Uygun Parça Bulunamadı</h3>
            
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVehicle): ?>
                    <strong><?php echo e($selectedVehicle->make); ?> <?php echo e($selectedVehicle->model); ?></strong> için şu an listelenmiş parça bulunmuyor veya girdiğiniz arama terimi eşleşmedi.
                <?php else: ?>
                    Arama terimini kontrol edebilir veya ana sayfadaki araç seçici ile arama yapabilirsiniz.
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>

            <div class="pt-4 flex flex-wrap justify-center gap-3">
                <a href="/" class="bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-5 py-2.5 rounded-xl transition">
                    Ana Sayfaya Dön
                </a>
                <a href="<?php echo e(route('products.search')); ?>" class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold px-5 py-2.5 rounded-xl transition">
                    Tüm Parçaları Göster
                </a>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.store', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\YBG\.gemini\antigravity-ide\scratch\auto-marketplace\resources\views/products/index.blade.php ENDPATH**/ ?>