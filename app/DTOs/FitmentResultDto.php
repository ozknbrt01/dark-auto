<?php

namespace App\DTOs;

use App\Enums\CompatibilityStatus;
use App\Models\Vehicle;

readonly class FitmentResultDto
{
    public function __construct(
        public CompatibilityStatus $status,
        public bool $isCompatible,
        public ?string $notes = null,
        public ?Vehicle $vehicle = null,
    ) {}

    public function toArray(): array
    {
        return [
            'status' => $this->status->value,
            'status_label' => $this->status->label(),
            'status_color' => $this->status->color(),
            'is_compatible' => $this->isCompatible,
            'notes' => $this->notes,
            'vehicle_title' => $this->vehicle?->full_title,
        ];
    }
}
