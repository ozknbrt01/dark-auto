<x-filament-panels::page>
    <style>
        /* Ağır Abi (Premium) Patron Zırhı */
        .bento-hero { background: linear-gradient(135deg, #111827, #030712); color: white; border-radius: 1.5rem; position: relative; overflow: hidden; border: 1px solid #1f2937; }
        .dark .bento-hero { background: linear-gradient(135deg, #0f172a, #020617); border-color: #1e293b; }
        
        .bento-card { background-color: #ffffff; color: #111827; border-radius: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #e5e7eb; }
        .dark .bento-card { background-color: #111827; color: #ffffff; border: 1px solid #1f2937; box-shadow: none; }
        
        .bento-text-muted { color: #6b7280; }
        .dark .bento-text-muted { color: #9ca3af; }
    </style>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
        
        <!-- 1. Kutu: Karşılama (Geniş Kutu) -->
        <div class="col-span-1 md:col-span-3 bento-hero p-6 flex flex-col justify-center">
            <div style="position: relative; z-index: 10;">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 0.25rem; letter-spacing: -0.015em;">Hoş Geldin Patron! 🚀</h2>
                <p style="font-size: 0.95rem; opacity: 0.8; max-width: 80%;">Sistemin kalbindesin. Dükkanda işler tıkırında, yeni siparişler ve onay bekleyen satıcılar aşağıda seni bekliyor.</p>
            </div>
        </div>

        <!-- 2. Kutu: Günlük Ciro (Kare) -->
        <div class="col-span-1 bento-card p-6 flex flex-col justify-center items-center text-center">
            <div class="bento-text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.25rem;">Bugünkü Ciro</div>
            <div style="font-size: 1.5rem; font-weight: 900;">₺24.500</div>
            <div style="color: #10b981; font-size: 0.75rem; font-weight: 700; margin-top: 0.25rem; background-color: rgba(16, 185, 129, 0.1); padding: 0.2rem 0.6rem; border-radius: 9999px;">+ %12 Artış</div>
        </div>

        <!-- 3. Kutu: Bekleyen Siparişler -->
        <div class="col-span-1 md:col-span-2 bento-card p-6 flex items-center gap-5">
            <div style="width: 3rem; height: 3rem; background-color: rgba(249, 115, 22, 0.1); color: #ea580c; border-radius: 0.75rem; display: flex; justify-content: center; align-items: center; font-size: 1.5rem;">📦</div>
            <div>
                <div class="bento-text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.15rem;">Kargolanacak Sipariş</div>
                <div style="font-size: 1.25rem; font-weight: 800;">18 Adet</div>
            </div>
        </div>

        <!-- 4. Kutu: Yeni Satıcı Başvuruları -->
        <div class="col-span-1 md:col-span-2 bento-card p-6 flex items-center gap-5">
            <div style="width: 3rem; height: 3rem; background-color: rgba(168, 85, 247, 0.1); color: #9333ea; border-radius: 0.75rem; display: flex; justify-content: center; align-items: center; font-size: 1.5rem;">🤝</div>
            <div>
                <div class="bento-text-muted" style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.15rem;">Yeni Mağaza Başvurusu</div>
                <div style="font-size: 1.25rem; font-weight: 800;">3 Bekleyen</div>
            </div>
        </div>
        
    </div>
</x-filament-panels::page>
