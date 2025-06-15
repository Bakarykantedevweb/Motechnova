<?php

namespace App\Http\Controllers\AuthEtudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginEtudiantController extends Controller
{
    public function index()
    {
        return view('authEtudiant.login');
    }
}
