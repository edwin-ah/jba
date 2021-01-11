<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditProjectController extends Controller
{
    public function index(Request $request){
        if($request->project == null){
            return redirect()->route('project');
        }
        $project = DB::table('projects')->where('projectname', '=', $request->project)->get();
        return view('admin.edit_project', [
            'project' => $project
        ]);
    }

    public function editProject(Request $request){
        if($request->projectname == null){
            return redirect()->route('project')
            ->with('failure', 'Inget projekt blev uppdaterat!');
        }
        $project = Project::find($request->oldProjectname);
        $project->projectname = $request->projectname;
        $project->description = $request->description;
        if($project->save()){
            return redirect()->route('project')
            ->with('success', 'Projektet '.$project->projectname .' är uppdaterat!');
        } else {
            return redirect()->route('project')
            ->with('failure', 'Inget projekt blev uppdaterat!');
        }
    }
}
