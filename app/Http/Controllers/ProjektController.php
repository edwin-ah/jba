<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjektController extends Controller
{
    public function index(){
        //Hämta alla projekt med bilderna som tillhör projektet
        $projects = DB::table('projects')
        ->join('project_images', 'project', 'projectname')
        ->get();

        return view('pages.projekt', [
            'projects' => $projects 
        ]);
    }
}
