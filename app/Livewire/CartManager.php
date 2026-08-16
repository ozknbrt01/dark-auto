<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class CartManager extends Component
{
    public array $cart = [];
    public ?string $feedbackMessage = null;

    public function mount(): void
    {
        $this->loadCart();
    }

    #[On('cart-updated')]
    public function loadCart(): void
    {
        $this->cart = session()->get('cart', []);
    }

    public function addToCart(int $productId, int $quantity = 1): void
    {
        $product = Product::with('vendor')->find($productId);

        if (!$product) {
            $this->feedbackMessage = 'Ürün bulunamadı!';
            return;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $product->id,
                'vendor_id' => $product->vendor_id,
                'vendor_name' => $product->vendor?->store_name ?? 'Satıcı',
                'title' => $product->title,
                'oem_code' => $product->oem_code,
                'sku' => $product->sku,
                'price' => (float) $product->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('cart-updated');
        $this->dispatch('show-toast', message: "'{$product->title}' sepete eklendi!");
        $this->feedbackMessage = "'{$product->title}' sepete eklendi!";
    }

    public function updateQuantity(int $productId, int $quantity): void
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
            session()->put('cart', $cart);
            $this->dispatch('cart-updated');
        }
    }

    public function removeItem(int $productId): void
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->dispatch('cart-updated');
        }
    }

    public function clearCart(): void
    {
        session()->forget('cart');
        $this->dispatch('cart-updated');
    }

    public function getTotalProperty(): float
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $this->cart));
    }

    public function render()
    {
        return view('livewire.cart-manager', [
            'cart' => $this->cart,
            'total' => $this->total,
        ]);
    }
}
