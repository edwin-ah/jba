<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request){
        if($request == null){
            return redirect('project');
        }
        //validera
        $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:6,10',
            'subject' => 'required|max:255',
            'description' => 'required|min:10'
        ]);

        //skicka mail
        try{
            Mail::to('potemose@gmail.com')->send(new ContactMail($request->email, $request->phone, $request->subject, $request->description));
            if(!count(Mail::failures()) > 0){
                return back()
                ->with('success', 'Email har skickats! Vi återkommer så snart vi kan.');
            } else {
                return back()
                ->with('failure', 'Ett fel uppstod, prova vid ett senare tillfälle.');
            }
        } 
        catch(Exception) {
            return back()
                ->with('failure', 'Ett fel uppstod, prova vid ett senare tillfälle.');
        }
        
    }
}
