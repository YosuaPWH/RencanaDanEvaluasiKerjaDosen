<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SimpulanController extends Controller
{
    function tampilSimpulan() {
        $dataTabel = DB::table('table_simpulan')->select('pendidikan', 'penelitian', 'pengabdian', 'penunjang')->where('id_akun', '=', Auth::user()->id)->first();

        return view('pages.simpulan')->with('data', $dataTabel);
    }   
}
