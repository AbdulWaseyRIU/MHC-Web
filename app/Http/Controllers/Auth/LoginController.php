<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $auth;
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FirebaseAuth $auth)
    {
        $this->middleware("guest")->except("logout");
        $this->auth =app("firebase.auth");
      // $auth = app("firebase.auth");
    }

    protected function login(Request $request)
    {
        try {
            $auth = app("firebase.auth");
            $signInResult = $auth->signInWithEmailAndPassword(
                $request["email"],
                $request["password"]
            );
            $user = new User($signInResult->data());

            //uid Session
            $loginuid = $signInResult->firebaseUserId();
            Session::put('uid',$loginuid);

            $result = Auth::login($user);
            return redirect($this->redirectPath());

        } catch (FirebaseException $e) {
            throw ValidationException::withMessages([
                $this->username() => [trans("auth.failed")],
            ]);
        }
    }
    public function username()
    {
        return "email";
    }

}
