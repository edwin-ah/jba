<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.registrera');
    }

    public function store(Request $request){
        //Validera 
        $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'required|unique:users|max:50',
            'password' => 'required|min:7|confirmed'
        ]);
        
        //Spara användaren
        //Använder user-model
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        //Logga in användaren
        Auth::attempt($request->only('username', 'password'));

        //Redirect
        return redirect()->route('index');
    }
}
