<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return redirect()->back()->with('success','Registration Successful!');
    }
}
