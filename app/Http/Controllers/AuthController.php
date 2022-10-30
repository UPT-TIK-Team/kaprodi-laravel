<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
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
    return view('voters.login');
  }

  public function authenticate(Request $request)
  {
    $lastURL = str_replace(url('/'), '', url()->previous());
    // Check if url form login from voters
    if ($lastURL === '/') {
      $formFields = $request->validate(['username' => 'required', 'tanggal-lahir' => 'required']);
      $voters = Pemilih::where('username', $formFields['username'])->where('tanggal_lahir', $formFields['tanggal-lahir'])->first();

      if ($voters) {
        if ($voters->status) {
          return back()->with('error', 'anda sudah memilih');
        }

        $request->session()->regenerate();
        return redirect('/voting');
      }

      return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    } else {
      $formFields = $request->validate(['username' => 'required', 'password' => 'required']);

      if (Auth::attempt($formFields)) {
        $request->session()->regenerate();
        return redirect('/admin');
      }

      return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }
  }
}
