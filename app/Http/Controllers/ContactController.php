<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|max:500'
        ]);
        Mail::to('tutodevphp@gmail.com')->send(new ContactMail($data));
        return back()->with('success','votre message a bien été envoyer !');
    }
}
