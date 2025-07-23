<?php

namespace App\Http\Livewire\Formateur\Statisque;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $monthlyEarnings = [];
    public $earningThisMonth;
    public $accountBalance;
    public $lifeTimeSales;

    public function mount()
    {
        $formateurId = Auth::guard('formateur')->user()->id;

        $year = now()->year;

        $earnings = DB::table('order_items')
            ->selectRaw('MONTH(created_at) as month, SUM(prix) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialiser un tableau avec 12 mois, par défaut 0
        $this->monthlyEarnings = array_fill(1, 12, 0);

        foreach ($earnings as $earning) {
            $this->monthlyEarnings[$earning->month] = (float) $earning->total;
        }

        $this->earningThisMonth = Transaction::whereMonth('paye_a', now()->month)
            ->whereYear('paye_a', now()->year)
            ->where('statut', 'approved')
            ->sum('montant');

        $this->accountBalance = Transaction::where('statut', 'approved')->sum('montant');

        $this->lifeTimeSales = OrderItems::count();
    }
    public function render()
    {
        return view('livewire.formateur.statisque.index', [
            'monthlyEarnings' => $this->monthlyEarnings,
        ])->extends('layouts.formateur')->section('content');
    }
}
