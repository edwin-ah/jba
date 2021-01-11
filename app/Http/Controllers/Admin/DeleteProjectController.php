<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteProjectController extends Controller
{
    public function index(Request $request){
        if($request->project == null){
            return redirect()->route('index');
        }
        $project = DB::table('projects')->where('projectname', '=', $request->project)->get();
        return view('admin.delete_project', [
            'project' => $project
        ]);
    }

    public function deleteProject(Request $request){
        if($request->delete == null){
            return redirect()->route('project')
            ->with('failure', 'Inget projekt borttaget!');
        }
        $projectname = DB::table('projects')->where('projectname', '=', $request->projectname)->pluck('projectname');
        if(Project::destroy($projectname[0])){
            return redirect()->route('project')
            ->with('success', 'Projekt '. $projectname .' är borttaget!');
        } else {
            return redirect()->route('project')
            ->with('failure', 'Det gick inte ta bort projektet!');
        }
    }
}
