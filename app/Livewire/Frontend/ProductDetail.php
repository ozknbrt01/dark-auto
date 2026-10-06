<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1;

    public function mount($id)
    {
        // Ürünü markası, kategorisi ve uyumlu araçlarıyla birlikte çek
        $this->product = Product::with(['brand', 'category', 'carEngines.carModel.carBrand'])->findOrFail($id);
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$this->product->id])) {
            $cart[$this->product->id]['quantity'] += $this->quantity;
        } else {
            $cart[$this->product->id] = [
                'id' => $this->product->id,
                'product_id' => $this->product->id,
                'name' => $this->product->name,
                'title' => $this->product->title,
                'price' => $this->product->price,
                'quantity' => $this->quantity,
                'vendor_id' => $this->product->vendor_id,
                'sku' => $this->product->sku,
                'image' => null // İleride eklenecek
            ];
        }
        
        session()->put('cart', $cart);
        $this->dispatch('cart-updated'); // Sepet ikonunu güncellemek için tetikleyici
        
        // Basit bir bildirim mesajı (Browser alert veya toast için kullanılabilir)
        session()->flash('message', 'Ürün başarıyla sepete eklendi!');
    }

    public function render()
    {
        return view('livewire.frontend.product-detail');
    }
}
