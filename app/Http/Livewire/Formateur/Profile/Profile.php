<?php

namespace App\Http\Livewire\Formateur\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    use WithFileUploads;

    public $nom, $prenom, $email, $telephone, $pays, $ville, $password, $password_confirmation, $photo, $photo_url, $specialites, $description;

    public function mount()
    {
        $user = Auth::guard('formateur')->user();

        $this->nom = $user->nom;
        $this->prenom = $user->prenom;
        $this->email = $user->email;
        $this->telephone = $user->telephone;
        $this->pays = $user->pays;
        $this->ville = $user->ville;
        $this->specialites = $user->specialites;
        $this->description = $user->description;
        $this->photo_url = $user->photo;
    }

    public function update()
    {
        $this->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::guard('formateur')->user();

        // Gérer l'image
        if ($this->photo) {
            $photoName = uniqid() . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('uploads/formateur', $photoName, 'public');
            $user->photo = $photoName;
        }

        $user->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'pays' => $this->pays,
            'ville' => $this->ville,
            'specialites' => $this->specialites,
            'description' => $this->description,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        session()->flash('success', 'Profil mis à jour avec succès.');
        return redirect('formateur/profile');
    }

    public function render()
    {
        return view('livewire.formateur.profile.profile')->extends('layouts.formateur')->section('content');;
    }
}
