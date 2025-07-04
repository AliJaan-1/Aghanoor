<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInputController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/form',[UserInputController::class,'create'])->name('user.form');
Route::post('/submit',[UserInputController::class,'store'])->name('user.store');

Route::get('/userlist',[UserInputController::class,'index'])->name('user.index');
Route::delete('/user/{id}',[UserInputController::class,'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}',[UserInputController::class,'edit'])->name('user.edit');
Route::put('user.update/{id}',[UserInputController::class,'update'])->name('user.update');

