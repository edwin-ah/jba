<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Project_image;
use Illuminate\Http\Request;

class AddImageController extends Controller
{
    public function index(){
        $projectname = Project::select('projectname')
                                ->orderBy('created_at', 'desc')
                                ->get();
        
        return view('admin.add_image', [
            'projectname' => $projectname
        ]);
    }

    public function storeImage(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //Hämta filens namn och filväg
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/projectImages', $filenameToStore);

        //Spara filen i databasen
        Project_image::create([
            'imagename' => $filenameToStore,
            'project' => $request->projectname
        ]);

        return redirect()->route('project')
            ->with('success', 'Bilden har nu laddats upp!');
    }
}
