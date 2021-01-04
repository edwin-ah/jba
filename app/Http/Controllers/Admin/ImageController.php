<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Project_image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $projektnamn = Project::get('projektnamn');
        
        return view('admin.add_image', [
            'projektnamn' => $projektnamn
        ]);
    }

    public function storeImage(Request $request){
        $this->validate($request, [
            'bild' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //Hämta filens namn och filväg
        $filenameWithExt = $request->file('bild')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('bild')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('bild')->storeAs('public/projectImages', $filenameToStore);

        //Spara filen i databasen
        Project_image::create([
            'namn' => $filenameToStore,
            'projekt' => $request->projektnamn
        ]);

        return redirect()->route('projekt')
            ->with('success', 'Bilden har nu laddats upp!');
    }
}
