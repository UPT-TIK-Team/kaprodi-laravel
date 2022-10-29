<?php

namespace App\Http\Controllers;

use App\Imports\PemilihImports;
use App\Models\Pemilih;
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
    return view('admin.pemilih.index', ['dataPemilih' => Pemilih::all(['name', 'username', 'tanggal_lahir'])]);
  }

  public function importData(Request $request)
  {
    try {
      Excel::import(new PemilihImports, $request->file('file')->store('temp'));
      return response()->json([
        'status' => 'success'
      ]);
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
      $failures = $e->failures();
      $failer_array = [];
      foreach ($failures as $failure) {
        $failer_array[] = $failure->errors()[0] . $failure->row();
      }
      return response()->json([
        'status' => 'failed', 'messages' => $failer_array
      ], 500);
    }
  }

  public function deleteDataPemilih()
  {
    Pemilih::truncate();
    return response()->json([
      'status' => 'success'
    ]);
  }
}
