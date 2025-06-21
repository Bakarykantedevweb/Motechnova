<?php

namespace App\Http\Livewire\Frontend\Formation;

use App\Models\Categorie;
use Livewire\Component;
use App\Models\Formation;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $updatesQueryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $categorie_ids = [];
    public $niveaux = [];
    public $prix = '';
    public function render()
    {
        $categories = Categorie::all();
        $formations = Formation::query()->with(['categorie', 'formateur'])->latest();

        if (!empty($this->categorie_ids)) {
            $formations->whereIn('categorie_id', $this->categorie_ids);
        }

        if (!empty($this->niveaux)) {
            $formations->whereIn('niveau', $this->niveaux);
        }

        if ($this->prix === 'gratuit') {
            $formations->where('payante', 'Non');
        } elseif ($this->prix === 'payant') {
            $formations->where('payante', 'Oui');
        }

        return view('livewire.frontend.formation.index', [
            'formations' => $formations->where('status', 1)->paginate(3),
            'categories' => $categories,
        ]);
    }
}
