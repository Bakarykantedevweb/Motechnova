<?php

namespace App\Http\Controllers\AuthEtudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterEtudiantController extends Controller
{
    public function index()
    {
        return view('authEtudiant.register');
    }
}
