<?php

namespace App\Http\Controllers;

use App\Imports\PemilihImports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index', ['coba' => 1]);
  }

  public function indexData(Request $request)
  {
    dd($request);
  }

  public function dataPemilih()
  {
    return view('admin.data_pemilih');
  }

  public function importData(Request $request)
  {
    Excel::import(new PemilihImports, $request->file('file')->store('temp'));
    return back();
  }
}
