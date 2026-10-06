<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\Layout;

class CartPage extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = collect($this->cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        
        $this->loadCart();
        $this->dispatch('cart-updated');
        session()->flash('success', 'Ürün sepetten kaldırıldı.');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.cart-page');
    }
}
