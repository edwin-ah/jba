<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        //Hämta alla projekt med bilderna som tillhör projektet
        $projects = Project::with('images')->get();
        
        return view('pages.projekt', [
            'projects' => $projects 
        ]);
    }
}
