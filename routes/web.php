<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;



Route::get('/',[RegisterController::class,'create']);
Route::post('/store',[RegisterController::class,'store']);
Route::get('/send-otp',[RegisterController::class,'sendOtp']);

