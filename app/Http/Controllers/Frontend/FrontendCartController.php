<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendCartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }

}
