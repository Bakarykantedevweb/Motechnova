<?php

namespace App\Http\Livewire\Frontend\ProduitsDigitaux;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    public $produit;

    public function ajouterPanier($id)
    {
        $etudiant = Auth::guard('etudiant')->user();

        // Vérifier si le produit digital est déjà dans le panier
        $existe = Cart::where('etudiant_id', $etudiant->id)
            ->where('produit_digital_id', $id)
            ->exists();

        if ($existe) {
            toastr()->warning('Produit déjà dans le panier');
            return;
        }

        // Ajouter au panier
        Cart::create([
            'etudiant_id' => $etudiant->id,
            'produit_digital_id' => $id,
            'quantite' => 1,
        ]);

        toastr()->success('Produit digital ajouté au panier');
        return redirect("carts");
    }
    public function render()
    {
        return view('livewire.frontend.produits-digitaux.detail');
    }
}
