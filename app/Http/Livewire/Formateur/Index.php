<?php
namespace App\Http\Livewire\Formateur;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\OrderItems;
use App\Models\Transaction;
use App\Models\Formation;
use App\Models\EtudiantFormation;

class Index extends Component
{
    public $formateur_id;

    public $mois = [];
    public $ventes = [];

    public $revenuTotal;
    public $revenuMois;
    public $etudiantsTotal;
    public $etudiantsMois;
    public $formationsTotal;
    public $formationsMois;

    public function mount()
    {
        $this->formateur_id = auth('formateur')->id();

        $this->chargerStatistiques();
        $this->chargerCartes();
    }

    public function chargerStatistiques()
    {
        $resultats = OrderItems::selectRaw('MONTH(orders.created_at) as mois, COUNT(*) as total')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('formations', 'order_items.formation_id', '=', 'formations.id')
            ->join('transactions', 'orders.id', '=', 'transactions.order_id')
            ->where('formations.formateur_id', $this->formateur_id)
            ->where('transactions.statut', 'approved')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        $this->mois = $resultats->pluck('mois')->map(function ($mois) {
            return Carbon::create()->month($mois)->locale('fr')->translatedFormat('F');
        });

        $this->ventes = $resultats->pluck('total');
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
