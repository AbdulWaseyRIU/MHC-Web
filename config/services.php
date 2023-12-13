<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'firebase' => [
        'apiKey' => 'AIzaSyDS56mPIYJc4MHNcDAzpv2NbbzbEZ8K3Bo',
        'authDomain' => 'mhc-web-4e434.firebaseapp.com',
        'databaseURL' => 'https://mhc-web-4e434-default-rtdb.firebaseio.com',
        'projectId' => 'mhc-web-4e434',
        'storageBucket' => 'mhc-web-4e434.appspot.com',
        'messagingSenderId' => '79254490741',
        'appId' => '1:79254490741:web:8489f685a3a5ac4061b23c',
        'measurementId' => 'G-G1TEKKRZ4Z',
    ],
];
