<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

use App\Models\User;
use Illuminate\Support\Facades\Auth as LaravelAuth;

class AuthController extends Controller
{
    protected $firebaseAuth;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(base_path('fiirebase-credentials.json'))->createAuth();
    }
    // $factory = (new Factory)->withServiceAccount('fiirebase-credentials.json.json');

    public function googleSignIn(Request $request)
    {
        $idToken = $request->input('idToken');

        try {
            // Verify Firebase ID token
            $verifiedIdToken = $this->firebaseAuth->verifyIdToken($idToken);
            $firebaseUid = $verifiedIdToken->claims()->get('sub');
            $userEmail = $verifiedIdToken->claims()->get('email');

            // Check if the user exists in your database
            $user = User::firstOrCreate(
                ['email' => $userEmail],
                ['name' => $verifiedIdToken->claims()->get('name')]
            );

            // Log the user in with Laravel
            LaravelAuth::login($user);

            return response()->json(['message' => 'User logged in successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid ID token', 'message' => $e->getMessage()], 401);
        }
    }
}
