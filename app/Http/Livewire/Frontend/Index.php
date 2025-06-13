<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Formation;

class Index extends Component
{
    public $formations;

    public function mount()
    {
        $this->formations = Formation::where('status', 1)->orderBy('id','desc')->limit(4)->get();
    }
    public function render()
    {
        return view('livewire.frontend.index');
    }
}
