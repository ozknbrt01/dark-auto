<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    public int $count = 0;
    public float $total = 0.00;

    public function mount(): void
    {
        $this->updateCartDetails();
    }

    #[On('cart-updated')]
    public function updateCartDetails(): void
    {
        $cart = session()->get('cart', []);
        $this->count = array_sum(array_column($cart, 'quantity'));
        $this->total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    }

    public function render()
    {
        return view('livewire.cart-counter');
    }
}
