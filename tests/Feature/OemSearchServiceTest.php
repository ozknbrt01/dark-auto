<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Products\OemLookupService;
use Tests\TestCase;

class OemSearchServiceTest extends TestCase
{
    public function test_it_finds_products_by_various_oem_formats(): void
    {
        $user = User::create(['name' => 'Vendor Test', 'email' => 'vendor@oem.com', 'password' => '123456']);
        $vendor = Vendor::create(['user_id' => $user->id, 'store_name' => 'VAG Parça Market', 'slug' => 'vag-parca']);

        $oilFilter = Product::create([
            'vendor_id' => $vendor->id,
            'title' => 'VAG 1.4/1.6 TDI Yağ Filtresi',
            'oem_code' => '03N 115 562 B',
            'sku' => 'FLT-03N',
            'price' => 320.00,
            'stock_quantity' => 25,
            'is_universal' => false,
            'status' => 'published',
        ]);

        $service = new OemLookupService();

        // 1. Boşluksuz arama
        $results1 = $service->findProductsByOem('03N115562B');
        $this->assertCount(1, $results1);
        $this->assertEquals($oilFilter->id, $results1->first()->id);

        // 2. Noktalı/Tireli/Küçük harfli arama
        $results2 = $service->findProductsByOem('03n-115.562-b');
        $this->assertCount(1, $results2);
        $this->assertEquals($oilFilter->id, $results2->first()->id);

        // 3. Yanlış OEM kodu ile boş sonuç
        $results3 = $service->findProductsByOem('9999999999');
        $this->assertCount(0, $results3);
    }
}
