<?php $__env->startSection('title', 'Siparişi Tamamla (Checkout) - OtoMarket'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-slate-400">
        <a href="/" class="hover:text-white transition">Ana Sayfa</a>
        <span>/</span>
        <span class="text-slate-200 font-medium">Siparişi Tamamla</span>
    </nav>

    <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white">Güvenli Sipariş & Ödeme</h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">Teslimat adresinizi girin ve siparişinizi onaylayın.</p>
        </div>
        <div class="hidden sm:flex items-center gap-2 text-emerald-400 text-xs font-semibold bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-2 rounded-xl">
            <span>🛡️</span>
            <span>256-Bit SSL ile Korunmaktadır</span>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($cart) > 0): ?>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Sol Sütun: Teslimat Bilgileri Formu -->
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-[#12192b]/90 border border-slate-800 rounded-2xl p-6 sm:p-8 backdrop-blur-md">
                    <h3 class="text-base font-bold text-white mb-6 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-blue-500/10 border border-blue-500/30 text-blue-400 flex items-center justify-center text-xs">1</span>
                        <span>Teslimat ve İletişim Bilgileri</span>
                    </h3>

                    <form id="checkout-form" action="<?php echo e(route('checkout.store')); ?>" method="POST" class="space-y-4">
                        <?php echo csrf_field(); ?>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Ad Soyad *</label>
                                <input 
                                    type="text" 
                                    name="customer_name" 
                                    value="<?php echo e(old('customer_name')); ?>"
                                    placeholder="Örn: Ahmet Yılmaz"
                                    required
                                    class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                >
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1.5">E-Posta Adresi *</label>
                                <input 
                                    type="email" 
                                    name="customer_email" 
                                    value="<?php echo e(old('customer_email')); ?>"
                                    placeholder="Örn: ahmet@example.com"
                                    required
                                    class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                >
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Telefon Numarası *</label>
                            <input 
                                type="tel" 
                                name="customer_phone" 
                                value="<?php echo e(old('customer_phone')); ?>"
                                placeholder="Örn: 0555 123 45 67"
                                required
                                class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Teslimat Adresi (İl, İlçe, Mahalle, Cadde/Sokak, No) *</label>
                            <textarea 
                                name="shipping_address" 
                                rows="3"
                                placeholder="Örn: Atatürk Mah. Fevzi Çakmak Cad. No:14 Daire:3 Kadıköy / İstanbul"
                                required
                                class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            ><?php echo e(old('shipping_address')); ?></textarea>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">Sipariş Notu (Opsiyonel)</label>
                            <input 
                                type="text" 
                                name="notes" 
                                value="<?php echo e(old('notes')); ?>"
                                placeholder="Örn: Şasi numaram: WVWZZZ1KZ... Uyum kontrolü rica ederim."
                                class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            >
                        </div>
                    </form>
                </div>

                <!-- Ödeme Seçeneği -->
                <div class="bg-[#12192b]/90 border border-slate-800 rounded-2xl p-6 sm:p-8 backdrop-blur-md">
                    <h3 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-400 flex items-center justify-center text-xs">2</span>
                        <span>Ödeme Yöntemi</span>
                    </h3>

                    <div class="bg-[#162035] border border-blue-500/40 rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <input type="radio" checked id="pay_method" class="w-4 h-4 text-blue-600 bg-slate-900 border-slate-700 focus:ring-blue-500">
                            <label for="pay_method" class="text-sm font-semibold text-white cursor-pointer">
                                💵 Kapıda Ödeme / Banka Havalesi (EFT)
                                <span class="block text-xs text-slate-400 font-normal">Siparişiniz onaylandıktan sonra satıcı tarafından kargolanır.</span>
                            </label>
                        </div>
                        <span class="text-xs bg-emerald-500/20 text-emerald-300 font-bold px-2.5 py-1 rounded border border-emerald-500/30">Ücretsiz Kargo</span>
                    </div>
                </div>
            </div>

            <!-- Sağ Sütun: Sepet Özeti & Sipariş Onay -->
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-[#12192b]/90 border border-slate-800 rounded-2xl p-6 sm:p-8 backdrop-blur-md space-y-6 sticky top-28">
                    <h3 class="text-base font-bold text-white flex items-center justify-between">
                        <span>Sepetinizdeki Parçalar</span>
                        <span class="text-xs text-slate-400 font-mono"><?php echo e(count($cart)); ?> Çeşit</span>
                    </h3>

                    <!-- Livewire Sepet Yöneticisi -->
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart-manager');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2181450511-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                    <button 
                        type="submit" 
                        form="checkout-form"
                        class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-400 hover:to-emerald-500 text-slate-950 font-black text-sm py-4 px-6 rounded-2xl transition shadow-xl shadow-emerald-500/25 flex items-center justify-center gap-2 group"
                    >
                        <span>✓ Siparişi Onayla & Tamamla</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    <?php else: ?>
        <div class="bg-[#12192b]/60 border border-dashed border-slate-800 rounded-3xl p-16 text-center max-w-2xl mx-auto space-y-4">
            <div class="text-4xl">🛒</div>
            <h3 class="text-xl font-bold text-white">Sepetinizde Ürün Bulunmuyor</h3>
            <p class="text-xs sm:text-sm text-slate-400">
                Sipariş oluşturmak için önce aracınıza uyumlu parçaları sepetinize eklemelisiniz.
            </p>
            <div class="pt-4">
                <a href="/" class="bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs px-6 py-3 rounded-xl transition inline-block">
                    Alışverişe Başla
                </a>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.store', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\YBG\.gemini\antigravity-ide\scratch\auto-marketplace\resources\views/checkout.blade.php ENDPATH**/ ?>