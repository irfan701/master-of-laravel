<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Mail\UserReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    function create()
    {
        return view('register');
    }

    function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
        ]);
        DB::table('users')->insert($request->except('_token'));
        //send mail

        Mail::to($request->email)->send(new RegistrationMail($request));
        //Mail::to('admin@mihdubai.com')->send(new UserReportMail());


        return redirect()->back()->with('success','Registration Successful!');
    }
}
