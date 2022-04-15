<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
    
    $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password']),
    ]);
    $token = $user->createToken('myToken')->plainTextToken;
    $repone = [
        'user' => $user,
        'token' => $token
    ];

    //or return response($response, 201);
    return response()->json($repone, Response::HTTP_CREATED);
    }


    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    
    //check email 
    $user = User::where('email', $fields['email'])->first();

    //check password
    if(!$user || !Hash::check($fields['password'], $user->password)){
        return response()->json([
            'message' => 'Bad credentials'
        ], 401);
    }

    $token = $user->createToken('myToken')->plainTextToken;
    $repone = [
        'user' => $user,
        'token' => $token
    ];

    //or return response($response, 201);
    return response()->json($repone, Response::HTTP_CREATED);
    }

    public function logout(Request  $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
