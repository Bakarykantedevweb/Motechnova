<?php

namespace App\Http\Livewire\Frontend\Formateur;

use Livewire\Component;
use App\Models\Formation;
use Livewire\WithPagination;
use App\Models\EtudiantFormation;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $formateur;
    public $etudiantsTotal;
    public $formationsTotal;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
         // Étudiants
        $this->etudiantsTotal = EtudiantFormation::whereHas('formation', function ($q) {
            $q->where('formateur_id', $this->formateur->id);
        })->distinct('etudiant_id')->count('etudiant_id');

        // Formations
        $this->formationsTotal = Formation::where('formateur_id', $this->formateur->id)->count();
    }
    public function render()
    {
        $formations = Formation::where('formateur_id', $this->formateur->id)->paginate(5);
        return view('livewire.frontend.formateur.index',[
            'formations' => $formations,
        ]);
    }
}
