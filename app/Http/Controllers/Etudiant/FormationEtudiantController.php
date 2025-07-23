<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EtudiantFormation;

class FormationEtudiantController extends Controller
{
    public function index($nom)
    {
        $formationDetails = Formation::where('nom',$nom)->first();
        $formation = EtudiantFormation::where('formation_id',$formationDetails->id)->where('etudiant_id',auth()->guard('etudiant')->user()->id)->first();
        if(!$formationDetails){
            toastr()->error("Page non trouve");
            return redirect('etudiant/dashboard');  
        }
        return view('etudiant.formations.index',compact('formation'));
    }
}
