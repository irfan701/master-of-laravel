<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Jobs\SendOtpJob;
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

        for ($i=9;$i<50;$i++){
            dispatch(new SendMailJob((object)$request->all()));
        }


        return redirect()->back()->with('success','Registration Successful!');

    }

    function sendOtp()
    {
        dispatch(new SendOtpJob())->onQueue('high');
        return redirect()->back()->with('success','Otp Send! Check your email');

    }
}

/*
 *     DEFAULT PRIORITY QUEUE STEPS
 *  php artisan queue:table
 *  php artisan make:job SendMailJob
 *  dispatch(new SendMailJob());
 *  QUEUE_CONNECTION=database
 *  php artisan queue:work
 *
 */

/*
 *      HIGH PRIORITY QUEUE STEPS
 * 
 *  php artisan make:mail SendOtpMail --markdown=emails.send-otp-mail
 *  php artisan queue:table
 *  php artisan make:job SendOtpJob
 *  dispatch(new SendOtpJob())->onQueue('high');
 *  QUEUE_CONNECTION=database
 *  php artisan queue:work --queue=high,default
 *
 */

