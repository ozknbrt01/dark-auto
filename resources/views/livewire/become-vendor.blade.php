<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-2xl">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Mağaza Açılış Başvurusu
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Hemen mağazanızı açın ve milyonlarca müşteriye ulaşın.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
        <div class="bg-white py-8 px-4 shadow-xl sm:rounded-2xl sm:px-10 border border-slate-100">
            <form wire:submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="shop_name" class="block text-sm font-medium text-slate-700">
                        Dükkan Adı (Mağaza İsmi)
                    </label>
                    <div class="mt-1">
                        <input wire:model.defer="shop_name" id="shop_name" type="text" class="appearance-none block w-full px-3 py-2.5 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    </div>
                    @error('shop_name') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tax_number" class="block text-sm font-medium text-slate-700">
                        Vergi Numarası / TCKN
                    </label>
                    <div class="mt-1">
                        <input wire:model.defer="tax_number" id="tax_number" type="text" class="appearance-none block w-full px-3 py-2.5 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    </div>
                    @error('tax_number') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tax_office" class="block text-sm font-medium text-slate-700">
                        Vergi Dairesi
                    </label>
                    <div class="mt-1">
                        <input wire:model.defer="tax_office" id="tax_office" type="text" class="appearance-none block w-full px-3 py-2.5 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    </div>
                    @error('tax_office') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="company_address" class="block text-sm font-medium text-slate-700">
                        Şirket / Mağaza Adresi
                    </label>
                    <div class="mt-1">
                        <textarea wire:model.defer="company_address" id="company_address" rows="3" class="appearance-none block w-full px-3 py-2.5 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"></textarea>
                    </div>
                    @error('company_address') <span class="text-rose-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-md text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Başvuruyu Tamamla
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
