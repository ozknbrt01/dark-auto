<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Meilisearch\Client;

class SetupMeilisearchIndices extends Command
{
    protected $signature = 'marketplace:setup-search';
    protected $description = 'Meilisearch indeks ayarlarını, filtrelenebilir alanları ve sıralama kurallarını yapılandırır.';

    public function handle(): int
    {
        $client = new Client(config('scout.meilisearch.host'), config('scout.meilisearch.key'));
        $index = $client->index('products');

        $this->info('Meilisearch "products" indeksi yapılandırılıyor...');

        $index->updateSearchableAttributes([
            'clean_oem_numbers',
            'oem_numbers',
            'sku',
            'barcode',
            'name',
            'brand_name',
            'category_name',
            'description',
        ]);

        $index->updateFilterableAttributes([
            'id',
            'vendor_id',
            'brand_id',
            'category_id',
            'is_universal',
            'is_in_stock',
            'price',
            'vehicle_ids',
            'vehicle_make_ids',
        ]);

        $index->updateSortableAttributes([
            'price',
            'created_at',
            'stock_quantity',
        ]);

        $index->updateRankingRules([
            'words',
            'typo',
            'proximity',
            'attribute',
            'sort',
            'exactness',
        ]);

        $this->info('✓ Meilisearch indeks ayarları başarıyla tamamlandı!');
        return Command::SUCCESS;
    }
}
