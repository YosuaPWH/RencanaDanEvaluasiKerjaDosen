<?php

namespace App\Http\Controllers;

use App\Models\TablePendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CRUDTableController extends Controller
{
    function tambahData(Request $request) {
        $namatabel = "";
        $url = "";
        if ($request->tabel == "pendidikan") {
            $namatabel = "table_pendidikan";
            $url = 'rencana-kerja/pendidikan';
        } else if($request->tabel == "penelitian") {
            $namatabel = "table_penelitian";
            $url = 'rencana-kerja/penelitian';
        }

        DB::table($namatabel)->insert([
			'bagian_table' => $request->pelaksanaan,
			'nama_kegiatan' => $request->namaKegiatan,
			'status' => $request->status,
			'jumlah_kegiatan' => $request->jumlahKegiatan,
            'beban_tugas' => $request->bebanTugas
		]);

        return redirect($url);
    }

    function getNamaTabel($jenisPelaksanaan) {
        if ($jenisPelaksanaan == "pendidikan") {
            return "table_pendidikan";
        } else if ($jenisPelaksanaan == "penelitian") {
            return "table_penelitian";
        } else if ($jenisPelaksanaan == "pengabdian") {
            return "table_pengabdian";
        } else if ($jenisPelaksanaan == "penunjang") {
            return "table_penunjang";
        }
    }

    function tampilData($jenisPelaksanaan) {
        $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        if ($jenisPelaksanaan == "pendidikan") {

            $tabelDataPendidikan = DB::table($namatabel)->select('bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas', 'rencana_pertemuan', 'sks_mk_terhitung', 'sks_bkd')->get();

            return view('pages.pel_pendidikan')->with('datapendidikan', $tabelDataPendidikan);

        } else if ($jenisPelaksanaan == "penelitian") {

            $tabelDataPenelitian = DB::table($namatabel)->select('nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->get();

            return view('pages.pel_penelitian')->with('datapenelitian', $tabelDataPenelitian);
            
        } else if ($jenisPelaksanaan == "pengabdian") {
            $pages = "pages/pel_pengabdian";
        } else if ($jenisPelaksanaan == "penunjang") {
            $pages = "pages/pel_penunjang";
        } else {
            return view('errors.404');
        }



        return view($pages);
    }
}
