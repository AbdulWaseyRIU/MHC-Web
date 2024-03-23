<?php

// app/Http/Controllers/FirebaseAuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Auth\UserRecord;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Exception\Auth\EmailExists;
use Kreait\Firebase\Exception\Auth\WeakPassword;

class FirebaseAuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create a new Firebase user
            $userProperties = [
                'email' => $request->input('email'),
                'emailVerified' => false,
                'password' => $request->input('password'),
                'displayName' => $request->input('name'),
                // Add more user properties as needed
            ];

            $createdUser = Firebase::auth()->createUser($userProperties);
            $users = Firebase::auth()->listUsers();
            dd($users);
            // Optionally, you can do additional actions after user creation
            // For example, log the user in
            // auth()->loginUsingId($createdUser->uid);
            dd(DB::connection()->getPdo());

            return redirect()->route('home')->with('success', 'User registered successfully');
        } catch (EmailExists $e) {
            return redirect()->back()->withErrors(['email' => 'Email address is already in use']);
        } catch (WeakPassword $e) {
            return redirect()->back()->withErrors(['password' => 'Password is too weak']);
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->withErrors(['error' => 'An error occurred while registering']);
        }
    }
}
