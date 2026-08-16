<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Marketplace - Otomotiv Yedek Parça Pazaryeri</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #090d16;
            --card-bg: rgba(255, 255, 255, 0.04);
            --card-border: rgba(255, 255, 255, 0.08);
            --primary: #3b82f6;
            --primary-glow: rgba(59, 130, 246, 0.35);
            --accent: #f59e0b;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.12) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(245, 158, 11, 0.08) 0%, transparent 40%);
        }

        .container {
            max-width: 900px;
            width: 100%;
            text-align: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 9999px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: #60a5fa;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 20px var(--primary-glow);
        }

        .badge .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 10px #10b981;
        }

        h1 {
            font-size: 3rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 30%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle {
            color: var(--text-muted);
            font-size: 1.15rem;
            max-width: 650px;
            margin: 0 auto 2.5rem;
            line-height: 1.6;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2.5rem;
            text-align: left;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.25s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .card p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: #f59e0b;
            color: #0f172a;
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.35);
        }

        .btn-primary:hover {
            background: #d97706;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.4);
        }

        .btn-secondary:hover {
            background: rgba(59, 130, 246, 0.25);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="badge">
            <span class="dot"></span>
            Laravel 11 & Filament v3 Platform Aktif
        </div>
        <h1>Otomotiv Yedek Parça & Aksesuar Pazaryeri</h1>
        <p class="subtitle">
            Araç Uyumluluk (Fitment) Motoru, Normalize Edilmiş OEM Arama ve Filament v3 Multi-Tenancy Mimarisiyle Güçlendirilmiş Çözüm.
        </p>

        <div class="grid">
            <div class="card">
                <h3>🚗 Fitment Engine</h3>
                <p>Make &gt; Model &gt; Year &gt; Engine hiyerarşisi ve montaj notlarıyla birebir araç uyumluluk kontrolü.</p>
            </div>
            <div class="card">
                <h3>⚡ Hızlı OEM Motoru</h3>
                <p>Boşluksuz ve temizlenmiş OEM indeksleri ile Meilisearch üzerinden anlık parça eşleştirme.</p>
            </div>
            <div class="card">
                <h3>📦 Bölünmüş Siparişler</h3>
                <p>Tek sepet, satıcı bazlı alt siparişler, dinamik komisyon ve net hakediş hesaplama sistemi.</p>
            </div>
        </div>

        <div class="buttons">
            <a href="/admin" class="btn btn-primary">👑 Admin Paneline Git</a>
            <a href="/vendor" class="btn btn-secondary">🏪 Satıcı Paneline Git</a>
        </div>
    </div>
</body>
</html>
