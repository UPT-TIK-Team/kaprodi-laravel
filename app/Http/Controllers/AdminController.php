<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index', ['coba' => 1]);
  }

  public function index_data(Request $request)
  {
    dd($request);
  }
}
