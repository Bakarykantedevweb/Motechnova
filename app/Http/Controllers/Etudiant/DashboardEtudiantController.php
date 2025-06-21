<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardEtudiantController extends Controller
{
    public function index()
    {
        return view('etudiant.index');
    }
    public function logout(Request $request)
    {
        Auth::guard('etudiant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success("Merci pour votre visite");
        return redirect('/');
    }
}
