<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Kreait\Firebase\Exception\Auth\UidMismatch;
use Kreait\Laravel\Firebase\Facades\Firebase;

Route::get('/firebase-users', function () {

        // Get all users from Firebase Authentication
        $users = Firebase::auth()->listUsers();

        // Display users
        return view('firebase-users', ['users' => $users]);

});
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

Route::get('/check', function () {
    try {
        // Attempt to connect to the database
        dd(DB::connection()->getPdo());

        // If the connection is successful, print connection details
        $databaseConnectionDetails = config('database.connections.' . config('database.default'));
        dd($databaseConnectionDetails);
    } catch (\Exception $e) {
        // If an exception is caught, print the error message
        dd($e->getMessage());
    }
});
require __DIR__.'/auth.php';
