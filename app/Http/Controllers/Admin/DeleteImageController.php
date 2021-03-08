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

        $succeed = array();

        $imageId = $request->imageId;
        foreach($imageId as $image){
            $imagename = DB::table('project_images')->where('id', '=', $image)->pluck('imagename');
            if(Storage::delete('public/projectImages/'.$imagename[0])){
                if(Project_image::destroy($image)){
                    array_push($succeed, true);
                } else {
                    array_push($succeed, false);
                }
            } else {
                array_push($succeed, false);
            }
        }

        if(in_array(true, $succeed)){
            return redirect()->route('project')
                ->with('success', 'En eller flera bilder är borttagna!');
        } else if(in_array(true, $succeed) && in_array(false, $succeed)){
            return redirect()->route('project')
                ->with('failure', 'En eller flera bilder är borttagna, men ett fel uppstod!');
        } else {
            return redirect()->route('project')
                ->with('failure', 'Ett fel uppstod');
        }
    }
}
