<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjektController extends Controller
{
    public function index(){
        return view('pages.projekt');
    }
}
