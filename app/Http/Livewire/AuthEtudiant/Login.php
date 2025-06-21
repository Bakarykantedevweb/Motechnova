<?php

namespace App\Http\Livewire\AuthEtudiant;

use App\Models\Etudiant;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function login()
    {
        $credentials = $this->validate();

        $etudiant = Etudiant::where('email',$this->email)->first();

        if(!$etudiant){

            toastr()->error("Adresse Email non trouve");
            return;
        }

        if($etudiant->is_blocked == 1) {

            toastr()->error("Votre compte est bloqué. Veuillez contacter l'administrateur");
            return;
        }

        if(Auth::guard('etudiant')->attempt($credentials))
        {
            $etudiant->update(['login_attempts' => 0]);

            session()->regenerate();

            toastr()->success("Bienvenue sur la plateforme MOTECHNOVA");
            return redirect()->intended('/etudiant/dashboard');
        }
        
        $etudiant->increment('login_attempts');

        if($etudiant->login_attempts >= 3)
        {
            $etudiant->update(['is_blocked' => 1]);
            toastr()->error("Votre compte a ete bloque apres 3 tentatives");
        }
        else{
            $restantes = 3 - $etudiant->login_attempts;
            toastr()->error("Identifiants incorrects. Tentatives restantes : $restantes");
        }
    }
    public function render()
    {
        return view('livewire.auth-etudiant.login');
    }
}
