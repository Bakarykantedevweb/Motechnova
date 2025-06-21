<?php

namespace App\Http\Livewire\Frontend\Formation;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class Detail extends Component
{
    public $formation;
    public $formationSimilaires;

    public function mount()
    {
        $this->formationSimilaires = Formation::where('payante', 'Oui')->where('categorie_id', $this->formation->categorie_id)->where('id', '!=', $this->formation->id)->get();
    }

    public function savePanier($formationId)
    {
        $etudiant = Auth::guard('etudiant')->user();

        // Vérifier si la formation est déjà dans le panier
        $existe = Cart::where('etudiant_id', $etudiant->id)
            ->where('formation_id', $formationId)
            ->exists();

        if ($existe) {
            toastr()->warning('Formation deja dans le panier');
            return;
        }

        // Ajouter au panier
        Cart::create([
            'etudiant_id' => $etudiant->id,
            'formation_id' => $formationId,
            'quantite' => 1,
        ]);

        toastr()->success('Formation ajoutee au panier');
    }
    public function render()
    {
        return view('livewire.frontend.formation.detail');
    }
}
