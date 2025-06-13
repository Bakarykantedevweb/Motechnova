<?php

namespace App\Http\Livewire\Frontend\Formation;

use Livewire\Component;
use App\Models\Formation;

class Detail extends Component
{
    public $formation;
    public $formationSimilaires;

    public function mount()
    {
        $this->formationSimilaires = Formation::where('payante','Oui')->where('categorie_id',$this->formation->categorie_id)->where('id','!=',$this->formation->id)->get();
    }
    public function render()
    {
        return view('livewire.frontend.formation.detail');
    }
}
