<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormationFormateurController extends Controller
{
    public function index()
    {
        return view('formateur.formation.index');
    }

    public function create()
    {
        return view('formateur.formation.create');
    }
}
