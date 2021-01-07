<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjektController extends Controller
{
    public function index(){
        //Hämta alla projekt med bilderna som tillhör projektet
        $projects = Project::get();

        return view('pages.projekt', [
            'projects' => $projects 
        ]);
    }
}
