<?php

namespace App\Http\Livewire\AuthFormateur;

use App\Models\Formateur;
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

        $formateur = Formateur::where('email',$this->email)->first();

        if(!$formateur){

            toastr()->error("Adresse Email non trouve");
            return;
        }

        if($formateur->is_blocked == 1) {

            toastr()->error("Votre compte est bloqué. Veuillez contacter l'administrateur");
            return;
        }

        if(Auth::guard('formateur')->attempt($credentials))
        {
            $formateur->update(['login_attempts' => 0]);

            session()->regenerate();

            toastr()->success("Bienvenue sur la plateforme MOTECHNOVA");
            return redirect('formateur/dashboard');
        }
        
        $formateur->increment('login_attempts');

        if($formateur->login_attempts >= 3)
        {
            $formateur->update(['is_blocked' => 1]);
            toastr()->error("Votre compte a ete bloque apres 3 tentatives");
        }
        else{
            $restantes = 3 - $formateur->login_attempts;
            toastr()->error("Identifiants incorrects. Tentatives restantes : $restantes");
        }
    }
    public function render()
    {
        return view('livewire.auth-formateur.login');
    }
}
