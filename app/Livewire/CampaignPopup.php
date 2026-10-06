<?php

namespace App\Livewire;

use Livewire\Component;

class CampaignPopup extends Component
{
    public $campaign;
    public $showPopup = false;

    public function mount()
    {
        if (!session()->has('campaign_popup_dismissed')) {
            $this->campaign = \App\Models\Campaign::with('vendor')
                ->where('is_active', true)
                ->where(function ($query) {
                    $query->whereNull('end_date')
                          ->orWhere('end_date', '>=', now());
                })
                ->inRandomOrder()
                ->first();

            if ($this->campaign) {
                $this->showPopup = true;
            }
        }
    }

    public function dismiss()
    {
        session()->put('campaign_popup_dismissed', true);
        $this->showPopup = false;
    }

    public function render()
    {
        return view('livewire.campaign-popup');
    }
}
