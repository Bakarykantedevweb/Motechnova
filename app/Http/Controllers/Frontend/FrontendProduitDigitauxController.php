<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ProduitDigital;
use App\Http\Controllers\Controller;

class FrontendProduitDigitauxController extends Controller
{
    public function index()
    {
        return view('frontend.produits-digitaux.index');
    }

    public function detail($titre)
    {
        $produit = ProduitDigital::where('titre', $titre)->first();
        if (!$produit) {
            toastr()->error("Produit non trouve");
            return redirect('produits-digitaux');
        }
        return view('frontend.produits-digitaux.detail', compact('produit'));
    }
}
