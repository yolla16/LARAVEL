<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view ('login');
    }

    public function postLogin(Request $request)
    {
        if (!auth()->attempt(['email'=> $request->email, 'password' => $request->password])) {
            return redirect()->back();
        }

        return redirect()->route('home');
    }

    public function getRegister()
    {
        return view ('register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:4',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8|confirmed'
        ]);

        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

            return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('Login');
    }
}