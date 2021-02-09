<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $projectImages = DB::table('project_images')->where('project', '=', $projectname)->get();
        if(Project::destroy($projectname[0])){
            foreach($projectImages as $image){
                try{
                    Storage::delete('public/projectImages/'.$image->imagename);
                }
                catch(Exception $ex){
                    return redirect()->route('project')
                    ->with('failure', 'Projektet är borttaget men det gick inte att ta bort bilden!');
                }
            }
            return redirect()->route('project')
            ->with('success', 'Projekt '. $projectname .' är borttaget!');
        } else {
            return redirect()->route('project')
            ->with('failure', 'Det gick inte ta bort projektet!');
        }
    }
}
