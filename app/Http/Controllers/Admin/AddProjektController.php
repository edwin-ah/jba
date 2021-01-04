<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AddProjektController extends Controller
{
    public function index(){
        return view('Admin.add_projekt');
    }

    public function storeProject(Request $request){
        //Validera
        $this->validate($request, [
            'projektnamn'=>'required|unique:projects',
        ]);

        //Spara projektet i databasen
        Project::create([
            'projektnamn' => $request->projektnamn,
            'beskrivning'=> $request->beskrivning
        ]);

        return redirect()->route('projekt')
            ->with('success', 'Projektet har nu laddats upp!');
    }
}
