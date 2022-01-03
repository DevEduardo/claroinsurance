<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::post('custom-login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/registration', function () {
        return view('auth.register');
    })->name('registration');
    
    Route::post('register', [AuthController::class, 'register'])->name('register'); 
    Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

    Route::get('users/{numberItem?}', [UserController::class, 'users'])->name('users');
    Route::get('user/update/{user}', [UserController::class, 'user'])->name('user.update');
    Route::get('user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('user/{user}', [UserController::class, 'update'])->name('update');

    Route::get('emails/{numberItem?}', [MailController::class, 'emails'])->name('emails');
    Route::post('get/emails', [MailController::class, 'datatable'])->name('emails.table');
    Route::get('email', function () {
        return view('emails.create');
    })->name('emails.create');
    Route::post('email', [MailController::class, 'store'])->name('email.send');
});
