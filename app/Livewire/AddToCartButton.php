<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToCartButton extends Component
{
    public int $productId;
    public bool $isAdded = false;

    public function addToCart(): void
    {
        $product = Product::with('vendor')->find($this->productId);

        if (!$product) {
            return;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity'] += 1;
        } else {
            $cart[$this->productId] = [
                'product_id' => $product->id,
                'vendor_id' => $product->vendor_id,
                'vendor_name' => $product->vendor?->store_name ?? 'Satıcı',
                'title' => $product->title,
                'oem_code' => $product->oem_code,
                'sku' => $product->sku,
                'price' => (float) $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cart-updated');

        $this->isAdded = true;
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
