<?php

namespace App\Http\Livewire\Admin\Formation;

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

    public $formation_id;

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

    public function show($id)
    {
        $this->formation_id = $id;
    }

    public function approuver()
    {
        $formation = Formation::where('id', $this->formation_id)->first();
        $formation->status = 1;
        $formation->save();
        toastr()->success("Formation Approuvee avec success");
        return redirect("admin/formations");
    }

    public function rejeter()
    {
        $formation = Formation::where('id', $this->formation_id)->first();
        $formation->status = 2;
        $formation->save();
        toastr()->success("Formation Approuvee avec success");
        return redirect("admin/formations");
    }

    public function render()
    {
        $formations = Formation::where('nom', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.formation.index', [
            'formations' => $formations,
        ]);
    }
}
