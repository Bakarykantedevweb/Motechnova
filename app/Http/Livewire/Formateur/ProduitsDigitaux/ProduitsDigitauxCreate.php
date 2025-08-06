<?php

namespace App\Http\Livewire\Formateur\ProduitsDigitaux;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProduitDigital;
use App\Models\TypeProduitDigital;
use Illuminate\Support\Facades\Auth;

class ProduitsDigitauxCreate extends Component
{
    use WithFileUploads;

    public $titre, $type_produit_digital_id, $prix = 0, $description;
    public $image, $fichier;
     public function store()
    {
        $this->validate([
            'titre' => 'required|string|max:255',
            'type_produit_digital_id' => 'required|exists:type_produit_digital,id',
            'image' => 'nullable|image|max:2048',
            'fichier' => 'required|file|max:10240', // max 10MB
            'prix' => 'nullable|numeric|min:0',
        ]);

        // 📥 Upload image
        $imagePath = null;
        if ($this->image) {
            $imageName = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('uploads/formateur/produits/images', $imageName, ['disk' => 'public_root']);
            $imagePath = 'uploads/formateur/produits/images/' . $imageName;
        }

        // 📦 Upload fichier
        $fileName = uniqid() . '.' . $this->fichier->getClientOriginalExtension();
        $this->fichier->storeAs('uploads/formateur/produits/fichiers', $fileName, ['disk' => 'public_root']);
        $fichierPath = 'uploads/formateur/produits/fichiers/' . $fileName;

        ProduitDigital::create([
            'formateur_id' => Auth::guard('formateur')->user()->id,
            'type_produit_digital_id' => $this->type_produit_digital_id,
            'titre' => $this->titre,
            'description' => $this->description,
            'prix' => $this->prix ?? 0,
            'image' => $imagePath,
            'fichier' => $fichierPath,
        ]);

        session()->flash('success', 'Produit digital ajouté avec succès.');
        return redirect('formateur/produits-digitaux');
    }
    public function render()
    {
        $types = TypeProduitDigital::all();
        return view('livewire.formateur.produits-digitaux.produits-digitaux-create',[
            'types' => $types
        ])->extends('layouts.formateur')->section('content');
    }
}
