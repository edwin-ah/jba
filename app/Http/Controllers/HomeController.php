<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public/projectImages';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage/projectImages';
        symlink($targetFolder,$linkFolder);
        return view('pages.index');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about(){
        return view('pages.about');
    }
}
