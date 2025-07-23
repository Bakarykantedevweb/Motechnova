<?php

namespace App\Http\Livewire\Etudiant;

use Livewire\Component;
use App\Models\EtudiantFormation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $dashboard = true;
    public $cours = false;
    public $changePassword = false;
    public $securite = false;

    public $mesCours;

    public $current_password, $new_password, $new_password_confirmation;

    private function disableContents()
    {
        $this->dashboard = false;
        $this->cours = false;
        $this->changePassword = false;
        $this->securite = false;
    }

    public function activeContent(string $content)
    {
        $content = decrypt($content);
        $this->disableContents();
        $this->$content = true;
    }

    public function mount()
    {
        $this->mesCours = EtudiantFormation::where('etudiant_id', auth()->guard('etudiant')->user()->id)->latest()->get();
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $etudiant = Auth::guard('etudiant')->user();

        if (!Hash::check($this->current_password, $etudiant->password)) {
            toastr()->error("Mot de passe actuel incorrect.");
            return;
        }

        $etudiant->password = Hash::make($this->new_password);
        $etudiant->save();

        // Réinitialise les champs
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        toastr()->success("Mot de passe mis à jour avec succès.");
    }

    public function render()
    {
        return view('livewire.etudiant.index');
    }
}
