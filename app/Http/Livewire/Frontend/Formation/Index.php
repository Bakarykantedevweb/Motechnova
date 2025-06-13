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

    public $categories;
    public function render()
    {
        $this->categories = Categorie::get();
        $formations = Formation::where('status', 1)->orderBy('id','desc')
        ->latest()
        ->paginate(5);
        return view('livewire.frontend.formation.index',[
            'formations' => $formations,
        ]);
    }
}
