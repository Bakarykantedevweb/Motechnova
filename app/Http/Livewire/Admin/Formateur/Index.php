<?php

namespace App\Http\Livewire\Admin\Formateur;

use App\Models\Formateur;
use Livewire\Component;

class Index extends Component
{
    public $formateurs;

     public $formateur_id, $name;

    public function mount()
    {
        $this->formateurs = Formateur::get();
    }

    public function debloquer($id)
    {
        $this->formateur_id = $id;
        $formateur = Formateur::find($this->formateur_id);
        $this->name = $formateur->nom.' '.$formateur->prenom;
    }

    public function unlockTrainer()
    {
        $formateur = Formateur::find($this->formateur_id);
        $formateur->is_blocked = 0;
        $formateur->login_attempts = 0;
        $formateur->save();
        toastr()->success('Formateur débloqué avec succès');
        return redirect("/admin/formateurs");
    }

    public function render()
    {
        return view('livewire.admin.formateur.index');
    }
}
