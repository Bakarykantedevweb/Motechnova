<?php

namespace App\Http\Livewire\Formateur\Commande;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $transactions = Transaction::with('order.orderItems.formation')->latest()->paginate(10);
        return view('livewire.formateur.commande.index',[
            'transactions' => $transactions
        ])->extends('layouts.formateur')->section('content');
    }
}
