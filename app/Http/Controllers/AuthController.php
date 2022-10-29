<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login/admin');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function loginUser()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate(['username' => 'required', 'password' => 'required']);

        if (Auth::attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }
        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }
}
