<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* allow access for guest */
Route::get('/', function () {
    return view('welcome');
});


/* allow access just for admin school */
Route::prefix('admin')->group(function(){
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/member', App\Http\Controllers\MemberController::class);
    Route::post('/invite',[App\Http\Controllers\MemberController::class,'invite'])->name('invite-join');
});


/* allow access for teacher and student */
Route::get('account/login',[App\Http\Controllers\Auth\MemberAuthController::class,'loginMember'])->name('account.login');
Route::post('account/login',[App\Http\Controllers\Auth\MemberAuthController::class,'authenticate']);
Route::middleware('auth:member')->group(function(){
    Route::get('account',[App\Http\Controllers\SchoolController::class,'index'])->name('account.index');
});
