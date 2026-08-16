<?php

namespace App\Models;

use App\Enums\UserRole;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'role',
        'is_vendor',
        'password',
        'phone',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'is_vendor' => 'boolean',
        ];
    }

    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function ownedVendors(): HasMany
    {
        return $this->hasMany(Vendor::class, 'user_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->role === 'admin' || true; // allow admin access
        }

        if ($panel->getId() === 'vendor') {
            return $this->is_vendor || $this->role === 'vendor' || $this->ownedVendors()->exists() || $this->vendors()->exists();
        }

        return true;
    }

    public function getTenants(Panel $panel): Collection
    {
        $owned = $this->ownedVendors()->where('status', 'active')->get();
        $staff = $this->vendors()->where('status', 'active')->get();

        return $owned->merge($staff)->unique('id');
    }

    public function canAccessTenant(Model $tenant): bool
    {
        if ($tenant instanceof Vendor) {
            return $tenant->user_id === $this->id || $this->vendors()->where('vendors.id', $tenant->id)->exists();
        }

        return false;
    }
}
