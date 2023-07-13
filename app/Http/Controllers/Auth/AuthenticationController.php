<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //perform user registration
    public function registerUser(userRequest $request)
    {
        //dd('test');
        $request->validated();

        $userData = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($userData);
        $token = $user->createToken('libraryWebApp')->plainTextToken;
        $user->assignRole('user');

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    //login user
    public function loginUser(loginRequest $request)
    {
       // dd('test');
        $request->validated();

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return response()->json([
                'message' => 'Invalid crediantial',
            ], 422);
        } else {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('libraryWebApp')->plainTextToken;
            return response()->json([
                'message' => 'You have login successfully',
                'user' => $user,
                'token' => $token,
            ], 200);
        }
    }

    //logout function
    public function logoutUser()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'You have successfully logout.'
        ]);
    }
}
