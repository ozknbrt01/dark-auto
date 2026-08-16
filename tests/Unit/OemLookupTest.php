<?php

namespace Tests\Unit;

use App\Services\Products\OemLookupService;
use PHPUnit\Framework\TestCase;

class OemLookupTest extends TestCase
{
    public function test_it_sanitizes_oem_numbers_correctly(): void
    {
        $service = new OemLookupService();

        $this->assertEquals('06A115561B', $service->sanitizeOem('06A 115 561 B'));
        $this->assertEquals('06A115561B', $service->sanitizeOem(' 06a-115.561-b '));
        $this->assertEquals('11427566327', $service->sanitizeOem('11 42 7 566 327'));
        $this->assertEquals('A0001802609', $service->sanitizeOem('A 000 180 26 09'));
    }
}
