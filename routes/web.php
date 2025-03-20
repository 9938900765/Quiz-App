<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('application.login_register');
});

Route::get('/blank', function () {
    return view('blank_page');
})->middleware(['auth', 'verified'])->name('blank');

Route::middleware('auth')->group(function () {

    Route::get('/quiz-menu', function () {
        return view('application.quiz_menu');
    });
    Route::get('/quiz-attempt', function () {
        return view('application.quiz_attempt');
    });
    Route::get('/quiz-list', function () {
        return view('application.quiz_list');
    });
    Route::get('/quiz-appear', function () {
        return view('application.quiz_appear');
    });
    Route::get('/logout', function () {
        session()->flush();
        Auth::logout();
        return redirect('/');
    });
});
