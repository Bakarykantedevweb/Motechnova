<?php

namespace App\Http\Livewire\Admin\TypeProduitsDigitaux;

use Livewire\Component;
use App\Models\TypeProduitDigital;

class TypeProduitsDigitaux extends Component
{
    public $typesProduitsDigitaux;
    public function mount()
    {
        $this->typesProduitsDigitaux = TypeProduitDigital::all();
    }
    public function render()
    {
        return view('livewire.admin.type-produits-digitaux.type-produits-digitaux')->extends('layouts.admin')->section('content');
    }
}
