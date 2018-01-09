<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        /*return "Page d'acceuil";*/
        return view('front.home');
    }
}
