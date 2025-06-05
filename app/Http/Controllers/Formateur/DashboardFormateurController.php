<?php

namespace App\Http\Controllers\Formateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardFormateurController extends Controller
{
    public function index()
    {
        return view('formateur.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('formateur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success("Merci pour votre visite");
        return redirect('/');
    }
}
