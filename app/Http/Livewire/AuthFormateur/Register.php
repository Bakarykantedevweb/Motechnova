<?php

namespace App\Http\Livewire\AuthFormateur;

use App\Models\Formateur;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $nom,$prenom,$email,$telephone,$password,$password_confirmation;

    protected $rules = [
        'nom' => 'required|string|min:2',
        'prenom' => 'required|string|min:2',
        'email' => 'required|email|unique:formateurs,email',
        'telephone' => 'required|string|min:8|unique:formateurs,telephone',
        'password' => 'required|confirmed|min:8',
    ];

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function register()
    {
        $validated = $this->validate();
        $formateur = new Formateur();
        $formateur->nom = $validated['nom'];
        $formateur->prenom = $validated['prenom'];
        $formateur->email = $validated['email'];
        $formateur->telephone = $validated['telephone'];
        $formateur->password = Hash::make($validated['password']);
        $formateur->save();
        auth('formateur')->login($formateur);
        toastr()->success("Bienvenue sur la plateforme MOTECHNOVA");
        return redirect('formateur/dashboard');

    }
    public function render()
    {
        return view('livewire.auth-formateur.register');
    }
}
