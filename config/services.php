<?php
return [
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => '24fbd0edd46019058da7', 
        'client_secret' => '4500e6ab7a9bb70608600fbdee37969276bb0685', 
        'redirect' => 'http://localhost:8000/login/github/callback',
     ],
     'google' => [
        'client_id' => '122886334250-fsfd8ugugkr0hjrkakukbgnnruomjn95.apps.googleusercontent.com', 
        'client_secret' => 'eyuwbzXGBgbebzPXNiqSOods', 
        'redirect' => 'http://localhost:8000/login/google/callback',
     ],
     'facebook' => [
        'client_id' => '1494792524037846', 
        'client_secret' => '1bf13c2faf680f4ae2b97bdafa92c7d2', 
        'redirect' => 'http://localhost:8000/login/facebook/callback',
     ],
];
