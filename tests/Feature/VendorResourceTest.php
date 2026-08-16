<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vendor;
use Tests\TestCase;

class VendorResourceTest extends TestCase
{
    public function test_it_creates_vendor_with_all_required_fields(): void
    {
        $user = User::create([
            'name' => 'Ahmet Usta',
            'email' => 'ahmet@ustaoto.com',
            'password' => 'secret123',
        ]);

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'store_name' => 'Usta Oto Fren Servisi',
            'slug' => 'usta-oto-fren-servisi',
            'description' => 'Fren ve debriyaj yedek parçaları uzmanı.',
            'tax_number' => '9876543210',
            'status' => 'pending',
            'commission_rate' => 12.50,
        ]);

        $this->assertDatabaseHas('vendors', [
            'user_id' => $user->id,
            'store_name' => 'Usta Oto Fren Servisi',
            'slug' => 'usta-oto-fren-servisi',
            'tax_number' => '9876543210',
            'status' => 'pending',
        ]);

        $this->assertEquals('Ahmet Usta', $vendor->user->name);
        $this->assertEquals('Usta Oto Fren Servisi', $user->ownedVendors()->first()->store_name);
    }
}
