<?php

namespace App\Http\Livewire\AuthEtudiant;

use Livewire\Component;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $nom,$prenom,$email,$telephone,$password,$password_confirmation;

    protected $rules = [
        'nom' => 'required|string|min:2',
        'prenom' => 'required|string|min:2',
        'email' => 'required|email|unique:etudiants,email',
        'telephone' => 'required|string|min:8|unique:etudiants,telephone',
        'password' => 'required|confirmed|min:8',
    ];

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function register()
    {
        $validated = $this->validate();
        $etudiant = new Etudiant();
        $etudiant->nom = $validated['nom'];
        $etudiant->prenom = $validated['prenom'];
        $etudiant->email = $validated['email'];
        $etudiant->telephone = $validated['telephone'];
        $etudiant->password = Hash::make($validated['password']);
        $etudiant->save();
        auth('etudiant')->login($etudiant);
        toastr()->success("Bienvenue sur la plateforme MOTECHNOVA");
        return redirect('/');

    }
    public function render()
    {
        return view('livewire.auth-etudiant.register');
    }
}
