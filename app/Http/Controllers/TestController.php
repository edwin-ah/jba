<?php

namespace App\Http\Controllers;

use App\Models\Project_image;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $images = Project_image::get();

        return view('pages.test', [
            'bilder' => $images
        ]);
    }
}
