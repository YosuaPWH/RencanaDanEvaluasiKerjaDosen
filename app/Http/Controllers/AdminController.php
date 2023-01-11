<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function tambahPeriode(Request $request) {
        $tahun = $request->tahun;
        $semester = $request->semester;

        $arrTahun = explode("/", $tahun);

        if (count($arrTahun) == 2) {
            $str1 = $arrTahun[0];
            $str2 = $arrTahun[1];

            if (((int)$str2 - (int)$str1) == 1) {

                $checkExistPeriode =  DB::table('table_periode')->where('periode', '=', $tahun.'-'.$semester)->first();

                if ($checkExistPeriode == null) {
                    $tahun1 = DateTime::createFromFormat('Y', $str1);
                    $tahun2 = DateTime::createFromFormat('Y', $str2);
                    $checkTahun1 = $tahun1 && $tahun1->format('Y') === $str1;
                    $checkTahun2 = $tahun2 && $tahun2->format('Y') === $str2;
            
                    if ($checkTahun1 && $checkTahun2) {

                        DB::table('table_periode')->insert([
                            'periode' => $tahun.'-'.$semester
                        ]);
                        return redirect('/');
                    } 
                } else {
                    return redirect('/rencana-kerja')->withErrors("Periode sudah ada");
                }
            } 
        }
        return redirect('/rencana-kerja')->withErrors("Inputan Tahun harus sesuai dengan format");
    }

    function tutupPeriode(Request $request) {
        DB::table('table_periode')->where('id', '=', $request->idperiode)->update([
            'status' => 'non-aktif'
        ]);

        return redirect('/');
    }

    function bukaPeriode(Request $request) {
        DB::table('table_periode')->where('id', '=', $request->idperiode)->update([
            'status' => 'aktif'
        ]);

        return redirect('/');
    }

    function hapusPeriode(Request $request) {
        DB::table('table_periode')->delete($request->delete_id);

        return redirect('/');
    }
}
