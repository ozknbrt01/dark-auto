<div class="w-full bg-[#111827]/90 backdrop-blur-xl border border-slate-700/80 rounded-2xl p-6 sm:p-8 shadow-2xl shadow-black/50 relative overflow-hidden">
    
    <!-- Üst Dekoratif Işık Efekti -->
    <div class="absolute -top-24 -right-24 w-60 h-60 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-60 h-60 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10">
        <div class="flex items-center justify-between gap-2 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/30 flex items-center justify-center text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        Aracınıza Birebir Uyumlu Parçayı Bulun
                    </h3>
                    <p class="text-xs text-slate-400">3 adımda aracınızı seçin, uyumsuz parça riskini sıfırlayın.</p>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVehicle): ?>
                <button 
                    wire:click="clearSelection" 
                    class="text-xs text-slate-400 hover:text-rose-400 transition flex items-center gap-1 bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 px-2.5 py-1.5 rounded-lg"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span>Temizle</span>
                </button>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- 3 Kaskatlı Seçim Izgarası (Make > Model > Generation/Year/Engine) -->
        <form wire:submit.prevent="findParts" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                
                <!-- 1. Marka (Make) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5 flex items-center justify-between">
                        <span>1. Araç Markası</span>
                        <span wire:loading wire:target="selectedMake" class="text-[10px] text-blue-400 animate-pulse">Yükleniyor...</span>
                    </label>
                    <div class="relative">
                        <select 
                            wire:model.live="selectedMake" 
                            class="w-full bg-[#1c2438] border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none cursor-pointer"
                        >
                            <option value="">-- Marka Seçin --</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($make); ?>"><?php echo e($make); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                        <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['selectedMake'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- 2. Model (Model) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5 flex items-center justify-between">
                        <span>2. Araç Modeli</span>
                        <span wire:loading wire:target="selectedModel" class="text-[10px] text-blue-400 animate-pulse">Yükleniyor...</span>
                    </label>
                    <div class="relative">
                        <select 
                            wire:model.live="selectedModel" 
                            <?php if(empty($selectedMake)): echo 'disabled'; endif; ?>
                            class="w-full bg-[#1c2438] disabled:bg-slate-900/60 disabled:text-slate-500 disabled:cursor-not-allowed border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none cursor-pointer"
                        >
                            <option value="">-- <?php echo e(empty($selectedMake) ? 'Önce Marka Seçin' : 'Model Seçin'); ?> --</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($model); ?>"><?php echo e($model); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                        <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['selectedModel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- 3. Kasa / Yıl / Motor (Generation / Year / Engine) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">3. Kasa / Yıl / Motor</label>
                    <div class="relative">
                        <select 
                            wire:model.live="selectedVehicleId" 
                            <?php if(empty($selectedModel)): echo 'disabled'; endif; ?>
                            class="w-full bg-[#1c2438] disabled:bg-slate-900/60 disabled:text-slate-500 disabled:cursor-not-allowed border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none cursor-pointer"
                        >
                            <option value="">-- <?php echo e(empty($selectedModel) ? 'Önce Model Seçin' : 'Kasa / Motor Seçin'); ?> --</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($variant['id']); ?>"><?php echo e($variant['label']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                        <div class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['selectedVehicleId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-400 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

            </div>

            <!-- Parça Bul Butonu -->
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-xs text-slate-400 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>Seçilen araca ait tüm fren, filtre ve motor parçaları listelenir.</span>
                </div>

                <button 
                    type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full sm:w-auto bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 disabled:opacity-50 text-slate-950 font-bold px-8 py-3.5 rounded-xl transition shadow-lg shadow-amber-500/25 flex items-center justify-center gap-2"
                >
                    <span wire:loading.remove wire:target="findParts">🔍 Uyumlu Parçaları Bul</span>
                    <span wire:loading wire:target="findParts" class="flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-slate-950" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Sorgulanıyor...</span>
                    </span>
                </button>
            </div>
        </form>

        <!-- Seçilen Araç Sonuç Kartı (Seçim Yapıldığında Gösterilir) -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedVehicle): ?>
            <div class="mt-6 pt-6 border-t border-slate-800/80 animate-fade-in">
                <div class="bg-gradient-to-r from-blue-950/40 to-slate-900/60 border border-blue-500/30 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 flex-shrink-0 text-xl">
                            🚗
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="bg-emerald-500/20 text-emerald-300 text-[11px] font-bold px-2.5 py-0.5 rounded-md border border-emerald-500/30">
                                    Aktif Araç Seçildi
                                </span>
                                <span class="text-xs text-slate-400 font-mono">
                                    Vehicle ID: <strong class="text-white">#<?php echo e($selectedVehicle->id); ?></strong>
                                </span>
                            </div>
                            <h4 class="text-base font-bold text-white mt-1">
                                <?php echo e($selectedVehicle->make); ?> <?php echo e($selectedVehicle->model); ?> <?php echo e($selectedVehicle->generation); ?>

                                <span class="text-slate-300 font-normal">(<?php echo e($selectedVehicle->year_from); ?> - <?php echo e($selectedVehicle->year_to ?? 'Günümüz'); ?>)</span>
                            </h4>
                            <p class="text-xs text-amber-400 font-medium mt-0.5">
                                Motor: <?php echo e($selectedVehicle->engine ?? 'Standart'); ?>

                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:self-center">
                        <a 
                            href="#products" 
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold px-4 py-2.5 rounded-lg transition text-center flex items-center justify-center gap-1.5 shadow-md shadow-blue-500/20"
                        >
                            <span>Parçaları Listele (<?php echo e($selectedVehicle->products()->count()); ?>)</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</div>
<?php /**PATH C:\Users\YBG\.gemini\antigravity-ide\scratch\auto-marketplace\resources\views/livewire/vehicle-selector.blade.php ENDPATH**/ ?>