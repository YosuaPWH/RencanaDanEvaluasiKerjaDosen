<?php

namespace App\Http\Controllers;

use App\Models\TablePendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CRUDTableController extends Controller
{
    function tambahData(Request $request, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);
        $url = $this->getUrl($jenisTabel);
        // dd($request);

        if($request->pelaksanaan == "A" && $jenisTabel == "pendidikan") {
            $rules = [
                'namaKegiatan' => 'required',
                'status' => 'required',
                'rencanaPertemuan' => 'required|numeric',
                'sksMKTerhitung' => 'required|numeric',
                'SKSBKD' => 'required|numeric'
            ];
        } else {
            $rules = [
                'namaKegiatan' => 'required',
                'status' => 'required',
                'bebanTugas' => 'required|numeric',
                'jumlahKegiatan' => 'required|numeric',
            ];
        }
        
        $message = [
            'required' => 'Input :attribute tidak boleh kosong',
            'numeric' => 'Input :attribute harus berupa angka'
        ];

        if($this->validate($request, $rules, $message)) {
            if($request->pelaksanaan == "A" && $jenisTabel == "pendidikan") {
                DB::table($namatabel)->insert([
                    'id_akun' => Auth::user()->id,
                    'bagian_table' => $request->pelaksanaan,
                    'nama_kegiatan' => $request->namaKegiatan,
                    'status' => $request->status,
                    'rencana_pertemuan' => $request->rencanaPertemuan,
                    'sks_mk_terhitung' => $request->sksMKTerhitung,
                    'sks_bkd' => $request->SKSBKD
                ]);
            } else {
                DB::table($namatabel)->insert([
                    'id_akun' => Auth::user()->id,
                    'bagian_table' => $request->pelaksanaan,
                    'nama_kegiatan' => $request->namaKegiatan,
                    'status' => $request->status,
                    'jumlah_kegiatan' => $request->jumlahKegiatan,
                    'beban_tugas' => $request->bebanTugas
                ]);
            }
        } 

        return redirect($url);
    }

    
    function tampilData($jenisPelaksanaan) {
        
        if ($jenisPelaksanaan == "pendidikan") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
                    
            $tabelDataPendidikan = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas', 'rencana_pertemuan', 'sks_mk_terhitung', 'sks_bkd')->where('id_akun', '=', Auth::user()->id)->get();
            
            return view('pages.pel_pendidikan')->with('datapendidikan', $tabelDataPendidikan);
            
        } else if ($jenisPelaksanaan == "penelitian") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id_akun', '=', Auth::user()->id)->get();
                        
            return view('pages.pel_penelitian')->with('datapenelitian', $dataTabel);
            
        } else if ($jenisPelaksanaan == "pengabdian") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id_akun', '=', Auth::user()->id)->get();

            return view('pages.pel_pengabdian')->with('datapengabdian', $dataTabel);
            
        } else if ($jenisPelaksanaan == "penunjang") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id_akun', '=', Auth::user()->id)->get();

            return view('pages.pel_penunjang')->with('datapenunjang', $dataTabel);
            
        } else {
            return view('errors.404');
        }
    }

    function showEditData(Request $request, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id', '=', $request->id)->first();

        return response()->json($dataTabel, 200);

    }

    function editData(Request $request, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        $rules = [
            'editNamaKegiatan' => 'required',
            'editStatus' => 'required',
            'editBebanTugas' => 'required|numeric',
            'editJumlahKegiatan' => 'required|numeric'
        ];

        $message = [
            'required' => 'Input :attribute tidak boleh kosong',
            'numeric' => 'Input :attribute harus berupa angka'
        ];

        if($this->validate($request, $rules, $message)) {

            DB::table($namatabel)->where('id', '=', $request->editId)->update([
                'nama_kegiatan' => $request->editNamaKegiatan,
                'jumlah_kegiatan' => $request->editJumlahKegiatan,
                'beban_tugas' => $request->editBebanTugas,
                'status' => $request->editStatus
            ]);
        } 
        
        return redirect($this->getUrl($jenisTabel));
    }

    function hapusData($jenisTabel, Request $request) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        DB::table($namatabel)->delete($request->delete_id);

        return redirect($this->getUrl($jenisTabel));
    }

    function getUrl($jenisTabel) {
        if ($jenisTabel == "pendidikan") {
            return "rencana-kerja/pendidikan";
        } else if($jenisTabel == "penelitian") {
            return "rencana-kerja/penelitian";
        } else if($jenisTabel == "pengabdian") {
            return "rencana-kerja/pengabdian";
        } else {
            return "rencana-kerja/penunjang";
        }
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
}
