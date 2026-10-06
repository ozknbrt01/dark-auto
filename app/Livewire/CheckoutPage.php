<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Attributes\Layout;

class CheckoutPage extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $phone = '';
    public $address = '';
    
    public $cart = [];
    public $total = 0;

    protected $rules = [
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'phone' => 'required|min:10',
        'address' => 'required|min:10',
    ];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        
        if(empty($this->cart)) {
            return redirect('/sepet');
        }

        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = collect($this->cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function placeOrder()
    {
        $this->validate();

        // 1. Sepetin (session('cart')) boş olup olmadığını kontrol et
        $this->cart = session()->get('cart', []);
        if (empty($this->cart)) {
            session()->flash('error', 'Sepetiniz boş. Lütfen ürün ekleyip tekrar deneyin.');
            return redirect('/sepet');
        }

        $this->calculateTotal();

        // 2. App\Models\Order oluştur.
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'user_id' => auth()->id(),
            'total_amount' => $this->total,
            'status' => 'pending',
            'shipping_address' => $this->address,
            'customer_name' => $this->first_name . ' ' . $this->last_name,
            'customer_email' => auth()->user()?->email, // kullanıcının email'i
            'customer_phone' => $this->phone,
        ]);

        // 3. Sepetteki ürünler için bir döngü başlat ve OrderItem oluştur.
        foreach ($this->cart as $item) {
            $product = Product::find($item['id'] ?? $item['product_id']);
            
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'vendor_id' => $product->vendor_id,
                    'sku' => $item['sku'] ?? ($product->sku ?? 'YOK'), // sku eksiksiz ekleniyor
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                    'product_name' => $item['name'] ?? $item['title'] ?? $product->title,
                ]);
            }
        }

        // 4. session()->forget('cart'); ile sepeti temizle
        session()->forget('cart');
        
        $this->dispatch('cart-updated');

        session()->flash('success', 'Siparişiniz başarıyla alındı! Sipariş No: ' . $order->order_number);
        
        // 5. /siparislerim rotasına yönlendir
        return redirect()->route('hesabim');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.checkout-page');
    }
}
