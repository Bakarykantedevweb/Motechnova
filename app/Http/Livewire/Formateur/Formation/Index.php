<?php

namespace App\Http\Livewire\Formateur\Formation;

use Livewire\Component;
use App\Models\Formation;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedFormation = null;

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $modulesOuverts = [];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showDetail($formationId)
    {
        $this->selectedFormation = Formation::with('modules.chapitres')->findOrFail($formationId);

        // Tous les modules sont repliés par défaut
        $this->modulesOuverts = [];

        foreach ($this->selectedFormation->modules as $index => $module) {
            $this->modulesOuverts[$index] = false;
        }
    }

    public function toggleModule($index)
    {
        $this->modulesOuverts[$index] = !$this->modulesOuverts[$index];
    }


    public function backToList()
    {
        $this->selectedFormation = null;
    }

    public function render()
    {
        $formations = Formation::where('formateur_id', auth('formateur')->id())
            ->where('nom', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.formateur.formation.index', [
            'formations' => $formations,
        ]);
    }
}
