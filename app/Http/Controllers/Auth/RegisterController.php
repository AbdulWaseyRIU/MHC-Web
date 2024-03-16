<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $auth;
    private $firebaseCredentials = [
        "type" => "service_account",
        "project_id" => "mhc-firebase-db6c8",
        "private_key_id" => "b3b405f28ed1a5e8116c6f1f64573577c405556d",
        "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDLclHe8yPgsXFp\nSlNehxKI9imiXFiSV++HfO3wPxtuFmfok3AskSWk9kMpI0SsVww2FvJkQuJVsgqR\nmqOZpDsqlvmPGzVv9HjIoHzM2qoZf6BK1AwPKc60Y8JcIoEHC5LhRdwHScE6AaHW\nNlE5rji2T/DNefzXLOva2uqSRj0Zjz7CkyBHUHyNG/QtdD3U1mpvyff+6op0ZRPT\neBEzFBh3gJitDt539jL8iaCa68BnuVwkB9M6j9DiX205AJTvjLGbCbKuC8jWlo5y\nTrrDsNh2tz+YY/smJIDgAuJAGXC3jR7J4vacAeeYCtWFM7y/v9ab9So37Ro78P7a\nCGsyjCzJAgMBAAECggEAIOR0A6eMVKrjouoLJhSRBNdFvnQPNuPkPGPQpV/Sm78g\nIBxcTbxO2YeeLqO+2d0+Am291UNyC/hb2JQnoLLKhRWBNieoQVhFgexemRE+YJ5/\niDGV3Iq+GnCpjxNeCIlQvz639u6wAKScaYGBKuH11dYBYPs4y4I+BLWRqMIV5VB3\nfl8kevEj4p4vlee0iy8ZNyy13PHBAksJ319Cutm+DNPxy6g5THKjeBjCqO1eOYVW\nqgrfaTcMqqYQN7iXY6TWpIwQX4WeOK5QD0ZzR0O8SoXvzKMXf25ABHRrlgfS0boY\n2lv2Krz1b90JfHxmf9jmrNY1+U5jtw7MbVU2tJOSPQKBgQDoqBOaTuuDzZ3xJSUD\nsaBIJfHgXfEI6inKS2nL+K6aL392sMJqojphYExb77N9ZSTsvqnss/MIgu4wyMLM\nYU/Bn+Zxu76NQLKhjMdUBfnJo1X15guLtQGWJ8BjadupvcjM4kaxmTD3+fmeLDCD\nnIykd5IIoNa6T/KEeJAgoYcNTQKBgQDf2/eWTQOdUvFeLqna2DtGy2tbQbfw9KC4\nvSz7bs0xb8qDwU9b3pP2OFXq/4cR770yGOdPJTESSZh2z0gjvoYKYqMJAB8tPSvy\nzT9K6jf3MkcJHQ8+VDEnn68Q+UCT1RlelYXrnKG75l5aRwJ2ZZb6jgtfTt/kV2yJ\nP5ltOVQPbQKBgQDQjVG9If92D8wDzRMoA4K1CeaPBEa7ggRiBUXaBJqnNeqhf4NX\nSQLiJQtt4inYPuFhouv5dblmqM9RRbVwtc5jt60/yFbgkd1OeT54sD6gJF065rL0\n0hWQ/yMzOkIhHzGvjyplqve9YgQDaIM4hw1/pHtwZpT1QBMZ8mToC0NfhQKBgQCV\nsVHuf7FbEou0nx+V5+I7hOtVKq0Fw491+YqK15z+4fJaCHo4xK3Mh/9sFVMM+3NY\nfK6wjf4ybGQ3joR+4nhfmXXMHvi6F527zuP0BItIEabOwU/gLgxwoqc+gm5cbLN6\nPCJBW4wLShDt7W4IHgbHpRSVtvigiJVbcdv23c8IQQKBgFIs/yU/FvNzy1YlHRAQ\nhBvRSmtIcbUal3kHiYRCnTwDp6TAxSvrK7s6uzOJwXFOZ0YVxhBz2vVRccsW7Z/I\nuWL1Vh30iEfF13eX+gket+Mx1jB/Rv+ly0RIvN3N2AigOtChW7LyPVnperYYqt2Q\nOxPhARUv0rClKiFLwfzAIvwu\n-----END PRIVATE KEY-----\n",
        "client_email" => "firebase-adminsdk-blj24@mhc-firebase-db6c8.iam.gserviceaccount.com",
        "client_id" => "108409655772889878830",
        "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
        "token_uri" => "https://oauth2.googleapis.com/token",
        "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
        "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-blj24%40mhc-firebase-db6c8.iam.gserviceaccount.com",
        "universe_domain" => "googleapis.com"
    ];
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $serviceAccount;
    public function __construct(FirebaseAuth $auth)
    {

        $this->middleware('guest');
        $this->auth = $auth;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            // User properties to be created
            $userProperties = [
                'email' => $request->input('email'),
                'emailVerified' => false,
                'password' => $request->input('password'),
                'displayName' => $request->input('name'),
                'disabled' => false,
            ];

            // Create a new user
            $createdUser = $this->auth->createUser($userProperties);

            // Save user details to Firestore "Users" collection
            $firebase = (new Factory())->withServiceAccount($this->firebaseCredentials);
            $firestore = $firebase->createFirestore();

            $usersCollection = $firestore->database()->collection('Users');
            $userDocumentRef = $usersCollection->document($createdUser->uid);

            // User details to be stored in Firestore
            $userDetails = [
                'email' => $createdUser->email,
                'name' => $createdUser->displayName,
                'phone_number' => $request->input('phone_number'),
                'uid' => $createdUser->uid,
            ];

            // Set the document with user details
            $userDocumentRef->set($userDetails);

            // Redirect to login page
            return redirect()->route('login');
        } catch (FirebaseException $e) {
            Session::flash('error', $e->getMessage());
            return back()->withInput();
        }
    }
}
