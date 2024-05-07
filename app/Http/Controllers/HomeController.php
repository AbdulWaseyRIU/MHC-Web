<?php

namespace App\Http\Controllers;

use Session;
use firebase;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use kreait\Firebase\Database;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\ServiceAccount;

use Illuminate\Support\Facades\Storage;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Exception\FirebaseException;

class HomeController extends Controller
{
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
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
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
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);

        $userId = auth()->user()->localId;

        $firebase = (new Factory())
            ->withServiceAccount($this->firebaseCredentials);

        // Get the Firestore instance from Firebase
        $firestore = $firebase->createFirestore();

        // Specify the collection name
        $collectionName = 'Predictions';

        // Reference to the 'Predictions' collection
        $collectionRef = $firestore->database()->collection($collectionName);

        // Query to retrieve all documents for the specified user ID
        $query = $collectionRef->where('userId', '=', $userId);

        // Get the documents
        $documents = $query->documents();

        // Extract data from each document
        $userData = [];
        foreach ($documents as $document) {
            $data = $document->data();
            $userData[] = $data;
        }

        // Correct usage of the compact function
        return view('previousreport', compact('userData'));
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
    public function uploadImage(Request $request)
    {

        $file = $request->file('File');

        if ($file) {
            $apiUrl = 'http://127.0.0.1:5000/gender_pred';

            $client = new Client();


            $response = $client->post($apiUrl, [
                'multipart' => [
                    [
                        'name'     => 'File1',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            $request = $request->request;

            if ($request->get('check_growth') === 'yes') {

                return view('growth', compact('result'));
            }

            // Check if the result contains an error key


            // Save result data to Firestore
            //  $this->saveResultToFirestore($result);

            // Save the image if needed
            //   $imagePath = 'images/' . $file->getClientOriginalName(); // Define your image path
            // Storage::put($imagePath, file_get_contents($file)); // Save the image to storage

            // Process the result and pass both the result and file to the report page

            return view('report', compact('result'));
        }


        $error = 'No image provided';
        return view('scan', compact('error'));
    }
    public function growthprediction(Request $request)
    {
        // Get the file information from hidden inputs
        $file1Name = $request->input('file1_name');
        $file1Type = $request->input('file1_type');
        $file1Data = $request->input('file1_data');

        $file2Name = $request->input('file2_name');
        $file2Type = $request->input('file2_type');
        $file2Data = $request->input('file2_data');

        $file3Name = $request->input('file3_name');
        $file3Type = $request->input('file3_type');
        $file3Data = $request->input('file3_data');

        // Construct multipart array for each file
        $multipart = [
            [
                'name'     => 'File1',
                'contents' => base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file1Data)),
                'filename' => $file1Name,
                'headers'  => [
                    'Content-Type' => $file1Type,
                ],
            ],
            [
                'name'     => 'File2',
                'contents' => base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file2Data)),
                'filename' => $file2Name,
                'headers'  => [
                    'Content-Type' => $file2Type,
                ],
            ],
            [
                'name'     => 'File3',
                'contents' => base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file3Data)),
                'filename' => $file3Name,
                'headers'  => [
                    'Content-Type' => $file3Type,
                ],
            ],
        ];

        // Send the multipart request to the API
        $apiUrl = 'http://127.0.0.1:5000/assess_growth';
        $client = new Client();
        $response = $client->post($apiUrl, ['multipart' => $multipart]);

        // Decode JSON response
        $result = json_decode($response->getBody(), true);

        // Return the view with the results
        return view('report', compact('result'));
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

    private function saveResultToFirestore(array $result)
    {
        $firebase = (new Factory())
            ->withServiceAccount($this->firebaseCredentials);

        // Get the Firestore instance from Firebase
        $firestore = $firebase->createFirestore();

        // Get the user ID using 'localId'
        $userId = auth()->user()->localId;

        // Extract probability and result from the $result variable
        $probability = round($result['probability'] * 100, 2); // Replace with the actual key used in $result for probability
        $label = $result['result']; // Replace with the actual key used in $result for result

        // Create an array with the data to be saved
        $data = [
            'confidence' => $probability . "%",
            'label' => $label,
            'Date' => now()->toDateTimeString(),
            'analysisType' => 'Gender Detection',
            'userId' => $userId,
        ];


        // Firestore interaction: Save result data to a new collection
        $newCollection = 'Predictions'; // Replace with your desired collection name
        $newCollectionRef = $firestore->database()->collection($newCollection);

        // Create a new document with the user ID as the document ID and set the data
        $newDocumentRef = $newCollectionRef->newDocument();
        $newDocumentRef->set($data);
    }
    public function getUserPredictions()
    {
        $userId = auth()->user()->localId;

        $firebase = (new Factory())
            ->withServiceAccount($this->firebaseCredentials);

        // Get the Firestore instance from Firebase
        $firestore = $firebase->createFirestore();

        // Specify the collection name
        $collectionName = 'Predictions';

        // Reference to the 'Predictions' collection
        $collectionRef = $firestore->database()->collection($collectionName);

        // Query to retrieve all documents for the specified user ID
        $query = $collectionRef->where('userId', '=', $userId);

        // Get the documents
        $documents = $query->documents();

        // Extract data from each document
        $userData = [];
        foreach ($documents as $document) {
            $data = $document->data();
            $userData[] = $data;
        }

        return $userData;
    }
    public function destroy($userId, $date)
    {
        // Get the authenticated user's ID
        $userId = auth()->user()->localId;

        // Initialize Firestore
        $firebase = (new Factory())
            ->withServiceAccount($this->firebaseCredentials);

        // Get the Firestore instance from Firebase
        $firestore = $firebase->createFirestore();

        // Specify the collection name
        $collectionName = 'Predictions';

        // Reference to the 'Predictions' collection
        $collectionRef = $firestore->database()->collection($collectionName);

        // Query to find the document
        $query = $collectionRef->where('Date', '=', $date);

        // Get the documents that match the query
        $snapshot = $query->documents();

        // Check if any documents match the query
        if (!$snapshot->isEmpty()) {
            foreach ($snapshot as $document) {
                // Delete the document
                $document->reference()->delete();
            }
            return redirect()->back()->with('success', 'Document(s) deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'No document(s) found for the given user ID and date.');
        }
    }
}
