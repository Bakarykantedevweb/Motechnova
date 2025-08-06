<?php

namespace App\Http\Livewire\Formateur;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Formation;
use App\Models\OrderItems;
use App\Models\Transaction;
use App\Models\EtudiantFormation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $formateur_id;

    public $days = [];
    public $sales = [];

    public $revenuTotal;
    public $revenuMois;
    public $etudiantsTotal;
    public $etudiantsMois;
    public $formationsTotal;
    public $formationsMois;

    public function mount()
    {
        $this->formateur_id = auth('formateur')->id();

        $this->generateDailySales();
        $this->chargerCartes();
    }

    public function generateDailySales()
    {
        $formateurId = Auth::guard('formateur')->user()->id;
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $results = DB::table('transactions')
            ->join('order_items', 'transactions.order_id', '=', 'order_items.order_id')
            ->join('formations', 'order_items.formation_id', '=', 'formations.id')
            ->where('formations.formateur_id', $formateurId)
            ->whereBetween('transactions.created_at', [$start, $end])
            ->selectRaw('DATE(transactions.created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $this->days = [];
        $this->sales = [];

        // Boucle du 1 au 31
        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $formatted = $date->format('Y-m-d');
            $this->days[] = $date->format('d M');
            $total = $results->firstWhere('date', $formatted)->total ?? 0;
            $this->sales[] = $total;
        }
    }

    public function chargerCartes()
    {
        // Revenus
        $this->revenuTotal = Transaction::where('statut', 'approved')
            ->whereHas('order.orderItems.formation', function ($query) {
                $query->where('formateur_id', $this->formateur_id);
            })->sum('montant');

        // Étudiants
        $this->etudiantsTotal = EtudiantFormation::whereHas('formation', function ($q) {
            $q->where('formateur_id', $this->formateur_id);
        })->distinct('etudiant_id')->count('etudiant_id');

        // Formations
        $this->formationsTotal = Formation::where('formateur_id', $this->formateur_id)->count();
    }

    public function render()
    {
        $formations = Formation::withCount('orders')
            ->withSum('orders as total_montant', 'prix')
            ->where('formateur_id', auth('formateur')->id())
            ->orderByDesc('orders_count') // top ventes
            ->take(5) // top 10
            ->get();

        return view('livewire.formateur.index', compact('formations'));
    }
}
