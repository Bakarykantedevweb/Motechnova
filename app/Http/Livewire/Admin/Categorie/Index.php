<?php

namespace App\Http\Livewire\Admin\Categorie;

use App\Models\Categorie;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public $categorie_id, $nom;
     protected function rules()
    {
        return [
            'nom' => 'required|string',
        ];
    }

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function saveCategorie()
    {
        $validatedData = $this->validate();
        $categorie = new Categorie();
        if ($this->categorie_id) {
            $categorie = Categorie::find($this->categorie_id);
        }
        $categorie->nom = $validatedData['nom'];
        $categorie->save();
        toastr()->success('categorie enregistré avec succès');
        return redirect("admin/categories");
    }

    public function editCategorie($id)
    {
        $categorie = Categorie::find($id);
        if ($categorie) {
            $this->categorie_id = $categorie->id;
            $this->nom = $categorie->nom;
        }
    }


    public function render()
    {
        $this->categories = Categorie::get();
        return view('livewire.admin.categorie.index');
    }
}
