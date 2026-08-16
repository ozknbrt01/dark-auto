<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    public function test_it_creates_user_with_vendor_role_and_attached_store(): void
    {
        $owner = User::create([
            'name' => 'Mağaza Sahibi',
            'email' => 'sahip@oto.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        $vendor = Vendor::create([
            'user_id' => $owner->id,
            'store_name' => 'Oto Yedek Market',
            'slug' => 'oto-yedek-market',
            'status' => 'active',
        ]);

        $vendorUser = User::create([
            'name' => 'Satıcı Personeli',
            'email' => 'personel@oto.com',
            'password' => Hash::make('secret456'),
            'role' => 'vendor',
            'is_vendor' => true,
        ]);

        $vendorUser->vendors()->attach($vendor->id, ['role' => 'manager']);

        $this->assertDatabaseHas('users', [
            'email' => 'personel@oto.com',
            'role' => 'vendor',
            'is_vendor' => true,
        ]);

        $this->assertTrue($vendorUser->vendors->contains('id', $vendor->id));
        $this->assertTrue(Hash::check('secret456', $vendorUser->password));
    }
}
