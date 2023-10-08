<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
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
        //send mail Jobs

        dispatch(new SendMailJob((object)$request->all()));
        return redirect()->back()->with('success','Registration Successful!');
    }
}

/*
 *      QUEUE STEPS
 *  php artisan queue:table
 *  php artisan make:job SendMailJob
 *  dispatch(new SendMailJob());
 *  QUEUE_CONNECTION=database
 *  php artisan queue:work
 *
 */

