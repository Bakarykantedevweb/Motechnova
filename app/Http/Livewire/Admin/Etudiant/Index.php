<?php

namespace App\Http\Livewire\Admin\Etudiant;

use Livewire\Component;
use App\Models\Etudiant;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

     public $etudiant_id, $name;


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
        $etudiants = Etudiant::paginate(10);
        return view('livewire.admin.etudiant.index', [
            'etudiants' => $etudiants
        ])->extends('layouts.admin')->section('content');
    }
}
