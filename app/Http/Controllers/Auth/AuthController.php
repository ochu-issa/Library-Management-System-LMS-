<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //view login page
    public function loginPage()
    {
        return view('auth.login');
    }

    //view register page
    public function registerPage()
    {
        return view('auth.registerpage');
    }

    //perform user registration
    public function userRegistration(userRequest $request)
    {
        //dd('test');
        $request->validated($request->all());

        if ($request->password != $request->confirm_password) {
            return back()->with('error', 'Password did not match!');
        }

        $userData = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($userData);
        $user->assignRole('user');
        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    //authentication page
    public function authentication(loginRequest $request)
    {
        //dd('test');
        $request->validated($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'welcome! you have been loggen in');
        } else {
            return back()->with('error', 'Invalid crediantial');
        }
    }

    //logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'welcome back!');
    }
}
