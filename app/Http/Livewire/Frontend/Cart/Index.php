<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $carts;

    public function mount()
    {
        if (Auth::guard('etudiant')->check()) {
            $this->carts = Cart::where('etudiant_id', Auth::guard('etudiant')->id())->latest()->get();
        }
    }
    public function render()
    {
        return view('livewire.frontend.cart.index');
    }
}
