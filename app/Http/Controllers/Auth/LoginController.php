<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('auth.logga_in');
    }

    //Validera inmatning
    public function loginUser(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        //Logga in användaren
        if(!Auth::attempt($request->only('username', 'password'))){
            return back()->with('inloggad', 'Ogiltliga inloggninsuppgifter');
        }

        //Redirect
        return redirect()->route('index');
    }

    
}
