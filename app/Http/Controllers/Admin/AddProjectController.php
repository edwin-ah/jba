<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AddProjectController extends Controller
{
    public function index(){
        return view('Admin.add_projekt');
    }

    public function storeProject(Request $request){
        //Validera
        $this->validate($request, [
            'projectname'=>'required|unique:projects',
            'description'=>'required'
        ]);

        //Spara projektet i databasen
        Project::create([
            'projectname' => $request->projectname,
            'description'=> $request->description
        ]);

        return redirect()->route('project')
            ->with('success', 'Projektet har nu laddats upp!');
    }
}
