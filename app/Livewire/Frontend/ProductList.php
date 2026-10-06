<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\CarEngine;
use Livewire\Attributes\Url;

class ProductList extends Component
{
    use WithPagination;

    #[Url]
    public $engine = null;

    public function render()
    {
        $query = Product::query();

        // Eğer URL'de engine parametresi varsa (arama yapılmışsa) filtrele
        if ($this->engine) {
            $query->whereHas('carEngines', function($q) {
                $q->where('car_engines.id', $this->engine);
            });
        }

        $products = $query->with(['category', 'brand'])->paginate(12);
        $selectedVehicle = $this->engine ? CarEngine::with(['carModel.carBrand'])->find($this->engine) : null;

        return view('livewire.frontend.product-list', [
            'products' => $products,
            'selectedVehicle' => $selectedVehicle
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        
        if (!$product) {
            return;
        }

        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'product_id' => $product->id,
                'name' => $product->name,
                'title' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'vendor_id' => $product->vendor_id,
                'sku' => $product->sku,
            ];
        }
        
        session()->put('cart', $cart);
        
        $this->dispatch('cart-updated');
        
        session()->flash('success', 'Ürün sepete eklendi!');
    }
}
