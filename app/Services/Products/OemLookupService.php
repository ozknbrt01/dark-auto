<?php

namespace App\Services\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OemLookupService
{
    public function sanitizeOem(string $rawOem): string
    {
        return strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $rawOem));
    }

    public function findProductsByOem(string $rawOem, bool $exactMatch = true): Collection
    {
        $cleanOem = $this->sanitizeOem($rawOem);

        if (empty($cleanOem)) {
            return new Collection();
        }

        return Product::query()
            ->where(function (Builder $q) use ($cleanOem, $exactMatch, $rawOem) {
                if ($exactMatch) {
                    $q->where('oem_code', $rawOem)
                      ->orWhereRaw("UPPER(REPLACE(REPLACE(REPLACE(oem_code, ' ', ''), '-', ''), '.', '')) = ?", [$cleanOem]);
                } else {
                    $q->where('oem_code', 'LIKE', "%{$rawOem}%")
                      ->orWhereRaw("UPPER(REPLACE(REPLACE(REPLACE(oem_code, ' ', ''), '-', ''), '.', '')) LIKE ?", ["%{$cleanOem}%"]);
                }
            })
            ->with(['vendor', 'vehicles'])
            ->get();
    }
}
