<?php

namespace App\Http\Livewire\Formateur\ProduitsDigitaux;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProduitDigital;
use App\Models\TypeProduitDigital;
use Illuminate\Support\Facades\Auth;

class ProduitsDigitaux extends Component
{
    use WithFileUploads;

    public $produits = [];
    public $types = [];
    public $editProduitId;

    public $editingProduct = null;
    public $editingProductId;

    public $titre, $description, $prix, $type_produit_digital_id;
    public $image, $fichier;

    public $showDetails = false;
    public $detailProduitId;
    public $detailNom;
    public $detailType;
    public $detailDescription;
    public $detailImage;
    public $detailFichier;


    protected $rules = [
        'titre' => 'required|string',
        'description' => 'required|string',
        'prix' => 'required|numeric',
        'type_produit_digital_id' => 'required|integer',
        'image' => 'nullable|file|image|max:2048',
        'fichier' => 'nullable|file|max:10000',
    ];

    public function mount()
    {
        $this->produits = ProduitDigital::where('formateur_id', Auth::guard('formateur')->id())->get();
        $this->types = TypeProduitDigital::all();
    }

    public function edit($id)
    {
        $product = ProduitDigital::findOrFail($id);
        $this->editingProduct = $product;
        $this->editProduitId = $product->id;
        $this->titre = $product->titre;
        $this->description = $product->description;
        $this->prix = $product->prix;
        $this->type_produit_digital_id = $product->type_produit_digital_id;
    }

    public function update()
    {
        $this->validate();

        $produit = ProduitDigital::findOrFail($this->editProduitId);
        $produit->titre = $this->titre;
        $produit->description = $this->description;
        $produit->prix = $this->prix;
        $produit->type_produit_digital_id = $this->type_produit_digital_id;

        // image
        if ($this->image) {
            $imageName = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('uploads/formateur/produits/images', $imageName, ['disk' => 'public_root']);
            $produit->image = 'uploads/formateur/produits/images/' . $imageName;
        }

        // fichier
        if ($this->fichier) {
            $fichierName = uniqid() . '.' . $this->fichier->getClientOriginalExtension();
            $this->fichier->storeAs('uploads/formateur/produits/fichiers', $fichierName, ['disk' => 'public_root']);
            $produit->fichier = 'uploads/formateur/produits/fichiers/' . $fichierName;
        }

        $produit->save();

        toastr()->success('Produit mis a jour avec succes ✅');
        $this->resetForm();
        $this->mount(); // Recharge la liste
    }

    public function resetForm()
    {
        $this->editingProduct = null;
        $this->reset(['titre', 'description', 'prix', 'type_produit_digital_id', 'image', 'fichier']);
    }

    public function showDetails($id)
    {
        $produit = ProduitDigital::findOrFail($id);

        $this->reset(['editingProduct', 'showDetails']); // réinitialise les autres vues
        $this->detailProduitId = $produit->id;
        $this->detailNom = $produit->titre;
        $this->detailType = $produit->type->nom;
        $this->detailDescription = $produit->description;
        $this->detailImage = $produit->image;
        $this->detailFichier = $produit->fichier;

        $this->showDetails = true;
    }

    public function render()
    {
        $types = TypeProduitDigital::all();
        return view('livewire.formateur.produits-digitaux.produits-digitaux')
            ->extends('layouts.formateur')->section('content');
    }
}

