<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = 1;

        if (!Auth::attempt($data)){
            return redirect()->back()->withErrors('Invalid Credential');
        }
        return redirect()->route('dashboard');
    }



    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->password = Hash::make($user->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
