<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(Request $request) {
        return view('login');
    }
        

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'kasir') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'owner') {
                return redirect('admin');
            }
        } else {
            return redirect('')->withErrors('Email dan password yang anda masukan tidak sesauai')->withInput(); 
        }
    }
    

    function logout() {
        Auth::logout();
        return redirect('');
    }
}
