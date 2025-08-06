<?php

namespace App\Http\Livewire\Frontend\ProduitsDigitaux;

use Livewire\Component;
use App\Models\ProduitDigital;

class Index extends Component
{

    public function render()
    {
        $produits = ProduitDigital::where('status', 1)->latest()->paginate(6);
        return view('livewire.frontend.produits-digitaux.index',
        [
            'produits' => $produits
        ]);
    }
}
