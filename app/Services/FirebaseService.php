<?php

namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $app;

    public function __construct()
    {
        $config = [
            'apiKey' => env('FIREBASE_API_KEY'),
            'authDomain' => env('FIREBASE_AUTH_DOMAIN'),
            'databaseURL' => env('FIREBASE_DATABASE_URL'),
            'projectId' => env('FIREBASE_PROJECT_ID'),
            'storageBucket' => env('FIREBASE_STORAGE_BUCKET'),
            'messagingSenderId' => env('FIREBASE_MESSAGING_SENDER_ID'),
            'appId' => env('FIREBASE_APP_ID'),
            'measurementId' => env('FIREBASE_MEASUREMENT_ID'),
        ];

        $this->app = (new Factory())->create($config);
    }

    public function getAuth()
    {
        return $this->app->auth();
    }
}