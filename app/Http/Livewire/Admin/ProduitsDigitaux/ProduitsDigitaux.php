<?php

namespace App\Http\Livewire\Admin\ProduitsDigitaux;

use Livewire\Component;
use App\Models\ProduitDigital;
use Illuminate\Support\Facades\Auth;

class ProduitsDigitaux extends Component
{

    public $showDetails = false;
    public $detailProduitId;
    public $detailNom;
    public $detailType;
    public $detailDescription;
    public $detailImage;
    public $detailFichier;

    public $id_produit;



    public function showDetails($id)
    {
        $produit = ProduitDigital::findOrFail($id);

        $this->reset(['showDetails']); // réinitialise les autres vues
        $this->detailProduitId = $produit->id;
        $this->detailNom = $produit->titre;
        $this->detailType = $produit->type->nom;
        $this->detailDescription = $produit->description;
        $this->detailImage = $produit->image;
        $this->detailFichier = $produit->fichier;

        $this->showDetails = true;
    }

    public function showModal($id)
    {
        $this->id_produit = $id;
    }

    public function validerProduit()
    {
        $produit = ProduitDigital::findOrFail($this->id_produit);
        $produit->status = 1;
        $produit->save();
        toastr()->success('Produit mis a jour avec succes ✅');
        return redirect('admin/produits-digitaux');
    }

    public function rejeterProduit()
    {
        $produit = ProduitDigital::findOrFail($this->id_produit);
        $produit->status = 2;
        $produit->save();
        toastr()->success('Produit mis a jour avec succes ✅');
        return redirect('admin/produits-digitaux');
    }
    public function render()
    {
        $produits = ProduitDigital::latest()->paginate(6);
        return view('livewire.admin.produits-digitaux.produits-digitaux',[
            'produits' => $produits
        ])->extends('layouts.admin')->section('content');
    }
}
