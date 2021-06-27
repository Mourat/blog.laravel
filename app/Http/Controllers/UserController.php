<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogin;
use App\Http\Requests\StoreRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(StoreRegistration $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'User registered successfully');
        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(StoreLogin $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            session()->flash('success', 'You are logged in.');
            if(Auth::user()->is_admin){
                return redirect()->route('admin.index');
            } else{
                return redirect()->home();
            }
        }
        return redirect()->back()->with('error', 'Incorrect login information');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
