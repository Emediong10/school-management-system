<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check())){
            if(Auth::user()->user_type == 1)
            {
               return redirect('admin/dashboard');
            }
            elseif (Auth::user()->user_type == 2) {
                return redirect('parent/dashboard');
            }
            elseif (Auth::user()->user_type == 3) {
                return redirect('teacher/dashboard');
            }
            elseif (Auth::user()->user_type == 4) {
                return redirect('student/dashboard');
            }
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true :false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],  $remember))
        {
            // $hashedPassword = Hash::make($request->password);
            // dd($hashedPassword);
            if(Auth::user()->user_type == 1)
            {
               return redirect('admin/dashboard');
            }
            elseif (Auth::user()->user_type == 2) {
                return redirect('parent/dashboard');
            }
            elseif (Auth::user()->user_type == 3) {
                return redirect('teacher/dashboard');
            }
            elseif (Auth::user()->user_type == 4) {
                return redirect('student/dashboard');
            }

        }
        else
        {
         return redirect()->back()->with('error', 'Enter your correct Password');
        }
    }

public function logout()
{
    Auth::logout();
    return redirect(url(''));
}
}
