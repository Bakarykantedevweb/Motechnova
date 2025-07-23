<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Formateur;
use App\Models\Formation;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $months = [];
    public $montantsParMois = [];

    public $ventesTotal;
    public $totalCours;
    public $totalEtudiants;
    public $totalProfesseurs;

    public function mount()
    {
        $this->months = ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $this->montantsParMois = Transaction::selectRaw('MONTH(paye_a) as month, SUM(montant) as total')
            ->whereNotNull('paye_a')
            ->whereYear('paye_a', now()->year)
            ->groupBy(DB::raw('MONTH(paye_a)'))
            ->orderBy('month')
            ->pluck('total', 'month')
            ->all();

        // Assurer les 12 mois présents, même si 0
        $this->montantsParMois = collect(range(1, 12))->map(function ($month) {
            return (float) number_format($this->montantsParMois[$month] ?? 0, 2, '.', '');
        })->toArray();

        $this->ventesTotal = number_format(Transaction::sum('montant'), 0, '.', ' ');
        $this->totalCours = Formation::count();
        $this->totalEtudiants = Etudiant::count();
        $this->totalProfesseurs = Formateur::count();
    }
    public function render()
    {
        return view('livewire.admin.index');
    }
}
