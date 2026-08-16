<?php

namespace Tests\Feature;

use App\Actions\Vendors\RegisterVendorAction;
use App\Enums\UserRole;
use App\Models\User;
use App\Models\Vendor;
use Tests\TestCase;

class RegisterVendorActionTest extends TestCase
{
    public function test_it_registers_vendor_and_assigns_owner_role(): void
    {
        $action = new RegisterVendorAction();

        $vendor = $action->execute([
            'owner_name' => 'Caner Demir',
            'email' => 'caner@demiroto.com',
            'password' => 'secret12345',
            'phone' => '05321112233',
            'store_name' => 'Demir Otomotiv Yedek Parça',
            'legal_name' => 'Demir Oto San. ve Tic. Ltd. Şti.',
            'tax_number' => '1234567890',
            'tax_office' => 'Maslak',
            'iban' => 'TR120006200000001234567890',
            'address' => 'Atatürk Oto Sanayi Sitesi 2. Kısım No: 45',
        ]);

        $this->assertInstanceOf(Vendor::class, $vendor);
        $this->assertEquals('pending', $vendor->status);
        $this->assertEquals('Demir Otomotiv Yedek Parça', $vendor->name);
        $this->assertEquals(10.00, (float) $vendor->commission_rate);

        // Kullanıcı kontrolleri
        $user = User::where('email', 'caner@demiroto.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue($user->hasRole(UserRole::VENDOR_OWNER->value));

        // Mağaza - Kullanıcı ilişkisi
        $this->assertTrue($vendor->users()->where('users.id', $user->id)->exists());
    }
}
