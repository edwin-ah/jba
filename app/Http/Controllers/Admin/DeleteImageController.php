<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteImageController extends Controller
{
    public function index(Request $request){
        $projectname = $request->project;
        $allImages = DB::table('project_images')->where("project", "=", $projectname)->get();
        return view('admin.delete_image', [
            'images' => $allImages 
        ]);
    }

    public function delete(Request $request){
        dd($request->imageId);
    }
}
