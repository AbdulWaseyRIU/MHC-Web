<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Kreait\Firebase\Exception\Auth\UidMismatch;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\FirebaseAuthController;

Route::get('/signup', [FirebaseAuthController::class, 'showSignUpForm'])->name('auth.signup.form');
Route::post('/signup', [FirebaseAuthController::class, 'signUp'])->name('auth.signup');
Route::get('/', function () {
    return view('welcome');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('report', function () {
    return view('report');
});
Route::get('previousreport', function () {
    return view('previousreport');
});
Route::get('scan', function () {
    return view('scan');
});
Route::get('about', function () {
    return view('aboutsoftware');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
