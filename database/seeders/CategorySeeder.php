<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fren Balataları & Disk',
                'slug' => 'fren-balatalari-disk',
                'icon' => '🛑',
                'description' => 'Fren balataları, fren diskleri ve fren sistemi bileşenleri.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Filtre Setleri',
                'slug' => 'filtre-setleri',
                'icon' => '💨',
                'description' => 'Yağ, hava, polen ve yakıt filtre setleri.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Debriyaj & Şanzıman',
                'slug' => 'debriyaj-sanziman',
                'icon' => '⚙️',
                'description' => 'Debriyaj setleri, şanzıman parçaları ve güç aktarım bileşenleri.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Motor Yağları',
                'slug' => 'motor-yaglari',
                'icon' => '🛢️',
                'description' => 'Sentetik, tam sentetik motor yağları ve katkılar.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Aydınlatma & Farlar',
                'slug' => 'aydinlatma-farlar',
                'icon' => '💡',
                'description' => 'Farlar, stop lambaları, sinyaller ve aydınlatma aksamları.',
                'sort_order' => 5,
            ],
            [
                'name' => 'Ateşleme & Buji',
                'slug' => 'atesleme-buji',
                'icon' => '🔋',
                'description' => 'Bujiler, bobinler ve ateşleme sistemi yedek parçaları.',
                'sort_order' => 6,
            ],
            [
                'name' => 'Süspansiyon & Amortisör',
                'slug' => 'suspansiyon-amortisor',
                'icon' => '🚙',
                'description' => 'Amortisörler, yaylar ve süspansiyon elemanları.',
                'sort_order' => 7,
            ],
            [
                'name' => 'Oto Aksesuar',
                'slug' => 'oto-aksesuar',
                'icon' => '🧽',
                'description' => 'Araç içi ve dışı aksesuarlar, oto bakım ürünleri.',
                'sort_order' => 8,
                'commission_rate' => 10.00,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
