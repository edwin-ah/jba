<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteImageController extends Controller
{
    public function index(Request $request){
        if($request->project == null){
            return redirect()->route('project');
        }
        $projectname = $request->project;
        $allImages = DB::table('project_images')->where('project', '=', $projectname)->get();
        return view('admin.delete_image', [
            'images' => $allImages 
        ]);
    }

    public function deleteImage(Request $request){
        if($request->imageId == null){
            return redirect()->route('project')
            ->with('failure', 'Ingen bild raderad!');
        }
        $imageId = $request->imageId;
        foreach($imageId as $image){
            $imagename = DB::table('project_images')->where('id', '=', $image)->pluck('imagename');
            if(Storage::delete('public/projectImages/'.$imagename[0])){
                if(Project_image::destroy($image)){
                    return redirect()->route('project')
                    ->with('success', 'De/den valda bilden är borttagen!');
                } else {
                    return redirect()->route('project')
                    ->with('failure', 'Det gick inte ta bort bilden!');
                }
            } else {
                return redirect()->route('project')
                ->with('failure', 'Det gick inte ta bort bilden!');
            }
        }
    }
}
