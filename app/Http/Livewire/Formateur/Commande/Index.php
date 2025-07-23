<?php

namespace App\Http\Livewire\Formateur\Commande;

use Livewire\Component;
use App\Models\Transaction;

class Index extends Component
{
    public $transactions;


    public function mount()
    {
        $this->transactions = Transaction::with('order.orderItems.formation')->latest()->get();
    }
    public function render()
    {
        return view('livewire.formateur.commande.index')->extends('layouts.formateur')->section('content');
    }
}
