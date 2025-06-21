<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendCheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout.index');
    }
}
