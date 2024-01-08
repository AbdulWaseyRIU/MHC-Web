<?php

namespace App\Http\Controllers;

use Session;
use firebase;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use kreait\Firebase\Database;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;

use Kreait\Firebase\Exception\FirebaseException;

class HomeController extends Controller
{  private $firebaseCredentials = [
    "type" => "service_account",
    "project_id" => "mhc-web-4e434",
    "private_key_id" => "83c82a42dffa159f7f34a424c914fff5b0d50634",
    "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCsEnNMy0u5rJKA\njTnkm2CqcNx4zfZ+ZctddRihkY1iBzFzb7+++5a0YUrYU1ws7dXxTGbt9cW+tNE3\nld/RBV6BadlTq+aDkxCrNfKUcW6Htz55MOncBO5bFy6SQAOL36n4NrvSK4V83PUB\nvdx66C/v+oLa7dUkNmZEGLG91Flv4IGq6mPXUvmG+pdWBxTQ0WuQxWLZw+ouQ0oL\n+IQ9q5yHW38jtIClsxebkMTkDZYkQnl0Me+PNBf1o9GXxQ66LW38ghLsvXNQYhny\nAP9Qqck7NP7pn/ubX3JS2MUkiQy9jfrgUjuF14JMahGNneHxbs9J38EjkZWN6sbK\n+YuHtHbTAgMBAAECggEAHD6AY9U603oFfMmxpwSaFAqn0Gx+TrZcGzW37/f5l7hL\n4Fbcx8x5gEI4DCoisdKYO3NUXIWVtSfuROF6S3pGI5fsRFUDEWB3wU1USWlqaycj\nlLZNV1ViioZ+Q83zcbzUzsQChbepwZpt3PX9KsTR7uIqeHpxcfA7+RF/RgQvv10l\nMcY6Cqkv/C15enJTYAlicP09ueI4A8kfFiC/TPnUzzT1t3eaTC8pyAAfnyLN5e4e\nEmIkMXEzEYXFLMSJFrXjFMWlpcp9wPOtcJHzQtAYfEBAqTaqr5y94+yrGPlLsJCN\ng47R308/FHuAW/dFJQ93uiiY2NZZ/ov8rWrIEcX/gQKBgQDseV4xdyYBew6YO2Su\n2yNgwKgF6y/ZYQaxs9ot3XgLR2Z994Xb+iITYYOF8Wckxl3apKnVMF5HyLUywtxg\noomrRgPdYGMURwQP3s2RRdTEKpxWD90Q2RnW508r47H1N7q34Sh6n18GUvVB4oUw\nzaS85cVkbqJEAoZGDwtiFfsInwKBgQC6R72rLvr2ZVW20wYVTvuIN9EdLMVkjb/D\nY2sfWJ9oa4Mqgcp134GEX6N3UYeLbnzUnQMPXrT1zmtZ+uGPXRcGnamfQVbcKZI+\nAvgxg7VGQygna2tgI3GUzedqqnYDXInR8GaL5ElO1CS8U1bbXW2/6sI1Er+n3HrT\n5cODQm3BTQKBgESK2VaVJpr/RDez33cfZZ3BufIdPX1QtlQDwZXRv93lEDwq5s3g\nLshXV3wXgMIUDVg2qlN09Z7w+jSAbshD1Iuke7JLIezauL6w4fzdtNI3V6FKb9VW\nWDsGSNh74zUktiZeSRFh6HU4zoYOVnTS5pEqOJDn0HjOEoV0DuSbYmwZAoGBAIPc\nOqeNVvrJmpYS5JB621R+ZlknkwbtzBuMKY0D17s7t5qES4OK1gyVAop4vOD3Mgfy\nqPLdUG1bU+Ra0gYAmEcHncVspAauqqWYxoWOPOhiq27T/CsOi90Qr8pypZ0ViT2B\n1aUa0MWrJ+HjgG1BwmmCzTxybBZv3MZYM0Cb6kNVAoGAKivefT1S/HGbMvx3YrAt\nI3VUuj+dehCLU9qZS7iubrcYMLDveY5VCBwSOX7lZ48KC9pigIBZrwB99SjkyvBw\nmKpo3wADeS5Ac51jkF1gpi/FGShWF6grDkXnzTwECE97GLB1TyiaI6qvBiYwFQ5S\nCL1Eg6Z/iEUNmy3JEmcd1r4=\n-----END PRIVATE KEY-----\n",
    "client_email" => "firebase-adminsdk-pr7ei@mhc-web-4e434.iam.gserviceaccount.com",
    "client_id" => "102169938569690277584",
    "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
    "token_uri" => "https://oauth2.googleapis.com/token",
    "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
    "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-pr7ei%40mhc-web-4e434.iam.gserviceaccount.com",
    "universe_domain" => "googleapis.com"
];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
{
    try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('report', compact('user'));
    } catch (\Exception $e) {
        return $e;
    }
}
public function previousreport()
{
    try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('previousreport', compact('user'));
    } catch (\Exception $e) {
        return $e;
    }
}
public function scan()
{
    try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        return view('scan', compact('user'));
    } catch (\Exception $e) {
        return $e;
    }
}

public function sendContactMessage(Request $request)
{
    $this->firebase = (new Factory())
    ->withServiceAccount(json_decode(json_encode($this->firebaseCredentials), true));

    $formData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
        'message' => $request->input('message'),
        'timestamp' => now()->toDateTimeString(),
    ];
    $firebase = (new Factory())->withServiceAccount(json_decode(json_encode($this->firebaseCredentials), true));

    // Get the Firestore instance from Firebase
    $firestore = $firebase->createFirestore();

    // Firestore document path (adjust as needed)
    $documentPath = 'Form/' . uniqid();

    // Firestore interaction: Writing form data to Firestore
    $formDocument = $firestore->database()->collection($documentPath);
    $formDocument->document($documentPath)->set($formData);

    // ... existing code (redirect, flash message, etc.) ...

    return redirect('/contact')->with('success', 'Form data has been submitted successfully!');
}
}

