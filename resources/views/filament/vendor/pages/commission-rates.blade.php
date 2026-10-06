<x-filament-panels::page>
    <div class="mb-4">
        <p class="text-sm text-[#D4AF37] font-semibold">
            Aşağıda sistemimizde tanımlı olan güncel kategori bazlı komisyon oranları yer almaktadır. Ürünleriniz bu kategorilerden hangisine aitse, satış işlemi gerçekleştiğinde o kategoriye ait güncel komisyon oranı ürünün satış fiyatı üzerinden hesaplanarak kesilir.
        </p>
    </div>

    {{ $this->table }}
</x-filament-panels::page>
