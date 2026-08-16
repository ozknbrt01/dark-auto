# Otomotiv Yedek Parça & Aksesuar Pazaryeri (Auto Marketplace)

Bu proje; Trendyol benzeri, otomotiv sektörüne özel **Multi-Vendor (Çok Satıcılı)**, **Araç Uyumluluk Motorlu (Fitment/K-Type)** ve **Bölünmüş Sipariş (Split-Order)** mimarisine sahip gelişmiş bir Laravel & Filament v3 platformudur.

---

## 🚀 Mimari ve Özellikler

1. **Multi-Tenancy (Satıcı İzolasyonu):**
   - **Admin Paneli (`/admin`):** Araç veritabanı, kategori, marka, satıcı onayları ve komisyon yönetimi.
   - **Satıcı Paneli (`/vendor/{tenant}`):** Satıcıların sadece kendi ürünlerini, stoklarını, OEM kodlarını ve alt siparişlerini (`SubOrders`) gördüğü Filament v3 Tenancy mimarisi.
2. **Araç Uyumluluk Motoru (Fitment Engine):**
   - `Make > Model > Generation > Year > Engine` hiyerarşisi.
   - `Product` ile `Vehicle` arasında Many-to-Many ilişki ve özel montaj notları ("Sadece ön aks", "Otomatik şanzıman").
   - Evrensel parçalar (`is_universal`) için otomatik fitment desteği.
3. **OEM Kod Arama & Normalizasyon:**
   - Boşluksuz/özel karaktersiz `clean_oem_number` sütunları ile milisaniyelik OEM araması.
4. **Meilisearch & Laravel Scout:**
   - OEM kodlarına en yüksek sıralama önceliği veren, araç ve kategori bazlı anlık arama motoru.
5. **Split Orders (Bölünmüş Siparişler):**
   - Müşteri tek sepette birden fazla satıcıdan ürün aldığında 1 Ana Sipariş (`Order`) ve her satıcı için ayrı Alt Siparişler (`SubOrder`) oluşturulur.
   - Satıcı bazlı özel komisyon (`commission_rate`) ve hakediş hesaplama motoru.

---

## 📂 Dosya ve Dizin Yapısı

```
auto-marketplace/
├── app/
│   ├── Actions/
│   │   ├── Orders/
│   │   │   └── CreateSplitOrderAction.php       # Bölünmüş Sipariş Motoru
│   │   └── Vendors/
│   │       └── RegisterVendorAction.php        # Satıcı Kayıt & Mağaza Başlatma
│   ├── DTOs/
│   │   ├── FitmentResultDto.php                # Uyumluluk Sonuç DTO
│   │   └── ProductSearchFilterDto.php          # Arama & Filtreleme DTO
│   ├── Enums/
│   │   ├── CompatibilityStatus.php             # Fitment Durumları
│   │   ├── SubOrderStatus.php                  # Satıcı Sipariş Durumları
│   │   └── UserRole.php                        # Rol Tanımları
│   ├── Filament/
│   │   ├── Admin/Resources/
│   │   │   ├── VehicleResource.php             # Admin Araç Veritabanı Yönetimi
│   │   │   └── VendorResource.php              # Admin Satıcı Onay & Komisyon
│   │   └── Vendor/Resources/
│   │       ├── ProductResource.php             # Satıcı Ürün, OEM & Fitment
│   │       └── SubOrderResource.php            # Satıcı Sipariş & Kargo Takip
│   ├── Http/Controllers/Api/
│   │   ├── FitmentCheckController.php          # AJAX Fitment Doğrulama
│   │   ├── ProductSearchController.php         # Anlık Meilisearch Arama
│   │   └── VehicleLookupController.php         # Kaskatlı Araç Seçim API
│   ├── Models/
│   │   ├── Brand.php
│   │   ├── Category.php
│   │   ├── Order.php
│   │   ├── OrderItem.php
│   │   ├── Product.php
│   │   ├── ProductImage.php
│   │   ├── ProductOemNumber.php
│   │   ├── SubOrder.php
│   │   ├── User.php
│   │   ├── Vehicle.php
│   │   ├── VehicleMake.php
│   │   ├── VehicleModel.php
│   │   └── Vendor.php
│   ├── Providers/Filament/
│   │   ├── AdminPanelProvider.php              # /admin Paneli
│   │   └── VendorPanelProvider.php             # /vendor Paneli (Tenant)
│   └── Services/
│       ├── Products/
│       │   └── OemLookupService.php            # Temizlenmiş OEM Arama
│       ├── Search/
│       │   └── ProductSearchService.php        # Scout & Meilisearch Motoru
│       └── Vehicles/
│           ├── VehicleCompatibilityService.php # Fitment İş Mantığı
│           └── VehicleLookupService.php        # Cache'li Kaskat Seçim
├── database/migrations/
│   ├── 2026_01_01_000001_create_vendors_table.php
│   ├── 2026_01_01_000002_create_vehicles_tables.php
│   ├── 2026_01_01_000003_create_products_and_fitment_tables.php
│   ├── 2026_01_01_000004_create_vendor_user_table.php
│   └── 2026_01_01_000005_create_orders_and_sub_orders_tables.php
└── composer.json
```

---

## 🛠️ Kurulum ve Çalıştırma Adımları

1. **Paketleri Yükleyin:**
   ```bash
   composer install
   ```

2. **Veritabanı Migrationlarını Çalıştırın:**
   ```bash
   php artisan migrate
   ```

3. **Meilisearch İndekslerini Yapılandırın:**
   ```bash
   php artisan marketplace:setup-search
   php artisan scout:import "App\Models\Product"
   ```

4. **Sunucuyu Başlatın:**
   ```bash
   php artisan serve
   ```
   - Admin Paneli: `http://localhost:8000/admin`
   - Satıcı Paneli: `http://localhost:8000/vendor`
