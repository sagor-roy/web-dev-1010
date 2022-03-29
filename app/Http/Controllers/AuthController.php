<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    // registration
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        try {
            $store = new User();
            $store->name = $request->input('name');
            $store->email = $request->input('email');
            $store->password = Hash::make($request->input('password'));
            $store->save();
            session()->flash('type','suceess');
            session()->flash('message','User registration successful');
            return redirect()->route('login');
        } catch (Exception $error) {
            session()->flash('type','error');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // login
    public function access(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                Toastr::success('Welcome to Home page','Success');
                return redirect()->route('home');
            }
            Toastr::error('Your creadential does not match our record','Error');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','error');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::logout();
        Toastr::success('Logout Successful','Success');
        return redirect()->route('login');
    }


}
