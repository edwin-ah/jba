<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjektController extends Controller
{
    public function index(){
        //Hämta alla projekt
        $projekten = DB::table('projects')
        ->join('project_images', 'projekt', 'projektnamn')
        ->get();

        //dd($projekten);
        

        return view('pages.projekt', [
            'projekten' => $projekten 
        ]);
    }
}
