<div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Kullanıcı Bilgilerim</h2>

        @if($successMessage)
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6 flex justify-between items-center shadow-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="font-bold">Bilgileriniz başarıyla güncellendi!</span>
                </div>
                <button wire:click="$set('successMessage', false)" class="font-bold text-xl hover:text-green-900">&times;</button>
            </div>
        @endif

        <form wire:submit.prevent="updateProfile" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Ad Soyad</label>
                <input type="text" wire:model="name" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">E-Posta (Değiştirilemez)</label>
                <input type="email" wire:model="email" class="w-full border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-500 cursor-not-allowed" readonly disabled>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Cep Telefonu</label>
                <input type="text" wire:model="phone" class="w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500" placeholder="05XX XXX XX XX">
            </div>
            
            <div class="md:col-span-2 mt-4 pt-4 border-t border-gray-100">
                <button type="submit" class="w-full md:w-auto bg-orange-500 hover:bg-orange-600 text-white font-bold py-2.5 px-8 rounded-lg shadow-md transition flex items-center justify-center gap-2">
                    <span wire:loading.remove wire:target="updateProfile">BİLGİLERİ GÜNCELLE</span>
                    <span wire:loading wire:target="updateProfile">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        Güncelleniyor...
                    </span>
                </button>
            </div>
        </form>
    </div>
