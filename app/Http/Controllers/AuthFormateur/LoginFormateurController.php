<?php

namespace App\Http\Controllers\AuthFormateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginFormateurController extends Controller
{
    public function index()
    {
        return view('authFormateur.login');
    }
}
