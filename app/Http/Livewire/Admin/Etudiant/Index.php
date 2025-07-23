<?php

namespace App\Http\Livewire\Admin\Etudiant;

use App\Models\Etudiant;
use Livewire\Component;

class Index extends Component
{
    public $etudiants;

     public $etudiant_id, $name;

    public function mount()
    {
        $this->etudiants = Etudiant::get();
    }

    public function debloquer($id)
    {
        $this->etudiant_id = $id;
        $etudiant = Etudiant::find($this->etudiant_id);
        $this->name = $etudiant->nom.' '.$etudiant->prenom;
    }

    public function unlockTrainer()
    {
        $etudiant = Etudiant::find($this->etudiant_id);
        $etudiant->is_blocked = 0;
        $etudiant->login_attempts = 0;
        $etudiant->save();
        toastr()->success('etudiant débloqué avec succès');
        return redirect("/admin/etudiants");
    }
    public function render()
    {
        return view('livewire.admin.etudiant.index')->extends('layouts.admin')->section('content');
    }
}
