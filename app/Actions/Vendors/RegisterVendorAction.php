<?php

namespace App\Actions\Vendors;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterVendorAction
{
    public function execute(array $data): Vendor
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['owner_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'] ?? null,
                'is_active' => true,
            ]);

            \Spatie\Permission\Models\Role::firstOrCreate(['name' => UserRole::VENDOR_OWNER->value, 'guard_name' => 'web']);
            $user->assignRole(UserRole::VENDOR_OWNER->value);

            $vendor = Vendor::create([
                'user_id' => $user->id,
                'store_name' => $data['store_name'],
                'slug' => Str::slug($data['store_name']) . '-' . Str::random(5),
                'description' => $data['description'] ?? null,
                'tax_number' => $data['tax_number'] ?? null,
                'status' => 'pending',
                'commission_rate' => 10.00,
            ]);

            $vendor->users()->attach($user->id, ['role' => 'owner']);

            return $vendor;
        });
    }
}
