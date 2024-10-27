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
        $this->firebaseAuth = (new Factory)->withServiceAccount(base_path('fiirebase-credentials.json'))->createAuth();
    }


    public function googleSignIn(Request $request)
    {
        $idToken = $request->input('idToken');

        try {

            $verifiedIdToken = $this->firebaseAuth->verifyIdToken($idToken);
            $firebaseUid = $verifiedIdToken->claims()->get('sub');
            $userEmail = $verifiedIdToken->claims()->get('email');
            $profileImageUrl = $verifiedIdToken->claims()->get('picture') ?? null;

            $user = User::firstOrCreate(
                ['email' => $userEmail],
                [
                    'name' => $verifiedIdToken->claims()->get('name'),
                    'img_url' => $profileImageUrl,
                    'password' => $firebaseUid
                ],

            );


            LaravelAuth::login($user);

            return response()->json(['message' => 'User logged in successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid ID token', 'message' => $e->getMessage()], 401);
        }
    }
}
