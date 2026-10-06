<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\SellerApplication;

class BecomeSeller extends Component
{
    public $full_name;
    public $tc_identity;
    public $tax_number;
    public $birth_year;
    public $accepted_terms = false;

    public function submit()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'tc_identity' => 'required|string|size:11',
            'tax_number' => 'nullable|string|max:255',
            'birth_year' => 'required|string|size:4',
            'accepted_terms' => 'accepted',
        ]);

        SellerApplication::create([
            'full_name' => $this->full_name,
            'tc_identity' => $this->tc_identity,
            'tax_number' => $this->tax_number,
            'birth_year' => $this->birth_year,
            'accepted_terms' => $this->accepted_terms,
        ]);

        $this->reset();
        session()->flash('message', 'Başvurunuz başarıyla alındı! En kısa sürede incelenecektir.');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.become-seller');
    }
}
