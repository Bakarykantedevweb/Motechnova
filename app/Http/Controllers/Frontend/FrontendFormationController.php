<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendFormationController extends Controller
{
    public function index()
    {
        return view('frontend.formation.index');
    }

    public function detail($nom)
    {
        $formation = Formation::where('nom',$nom)->where('payante','Oui')->first();
        if(!$formation){
            toastr()->error("Page non trouve");
            return redirect('formations');  
        }
        return view('frontend.formation.detail',compact('formation'));
    }

    public function detailFree($nom)
    {
        $formation = Formation::where('nom',$nom)->where('payante','Non')->first();
        if(!$formation){
            toastr()->error("Page non trouve");
            return redirect('formations');  
        }
        return view('frontend.formation.detailFree',compact('formation'));
    }

    public function detailFormateur($nom,$id)
    {
        $ID = decrypt($id);
        $formateur = Formateur::where('id',$ID)->where('nom',$nom)->first();
        if(!$formateur){
            toastr()->error("Page non trouve");
            return redirect('formations');  
        }
        return view('frontend.formateur.index',compact('formateur'));
    }
}
