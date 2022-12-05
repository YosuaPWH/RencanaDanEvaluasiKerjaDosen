<?php

namespace App\Http\Controllers;

use App\Models\TablePendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CRUDTableController extends Controller
{
    function tambahData(Request $request) {
        // dd($request->all(), $request->tabel);


        // $tambah = new TablePendidikan;

        // $tambah->bagian_table = $request->pelaksanaan;
        // $tambah->nama_kegiatan = $request->namaKegiatan;
        // $tambah->status = $request->status;
        // $tambah->jumlah_kegiatan = $request->jumlahKegiatan;
        // $tambah->beban_tugas = $request->bebanTugas;
        // $tambah->save();
        $namatabel = "";
        if ($request->tabel == "pendidikan") {
            $namatabel = "table_pendidikan";
        } else if($request->tabel == "penelitian") {
            $namatabel = "table_penelitian";
        }

        DB::table($namatabel)->insert([
			'bagian_table' => $request->pelaksanaan,
			'nama_kegiatan' => $request->namaKegiatan,
			'status' => $request->status,
			'jumlah_kegiatan' => $request->jumlahKegiatan,
            'beban_tugas' => $request->bebanTugas
		]);
        // dd($tambah);

        $pages = "";
        if ($request->tabel == "pendidikan") {
            $pages = "pages/pel_pendidikan";
        } else if ($request->tabel == "penelitian") {
            $pages = "pages/pel_penelitian";
        } else if ($request->tabel == "pengabdian") {
            $pages = "pages/pel_pengabdian";
        } else if ($request->tabel == "penunjang") {
            $pages = "pages/pel_penunjang";
        }

        return view($pages);
    }

    function tampilData($jenisPelaksanaan) {
        $pages = "";
        if ($jenisPelaksanaan == "pendidikan") {
            $pages = "pages/pel_pendidikan";
        } else if ($jenisPelaksanaan == "penelitian") {
            $pages = "pages/pel_penelitian";
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
