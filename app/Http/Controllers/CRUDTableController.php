<?php

namespace App\Http\Controllers;

use App\Models\TablePendidikan;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CRUDTableController extends Controller
{
    function tambahData(Request $request, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);
        $url = $this->getUrl($jenisTabel);

        if($request->pelaksanaan == "A" && $jenisTabel == "pendidikan") {
            $rules = [
                'namaKegiatan' => 'required',
                'statusA' => 'required',
                'rencanaPertemuan' => 'required|numeric',
                'sksMkTerhitung' => 'required|numeric',
                'SksBkd' => 'required|numeric'
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
                    'status' => $request->statusA,
                    'rencana_pertemuan' => $request->rencanaPertemuan,
                    'sks_mk_terhitung' => $request->sksMkTerhitung,
                    'sks_bkd' => $request->SksBkd
                ]);
                // $pendidikanSKS = DB::table('table_simpulan')
                DB::table('table_simpulan')->where('id_akun', '=', Auth::user()->id)->increment($jenisTabel, $request->SksBkd);
            } else {
                DB::table($namatabel)->insert([
                    'id_akun' => Auth::user()->id,
                    'bagian_table' => $request->pelaksanaan,
                    'nama_kegiatan' => $request->namaKegiatan,
                    'status' => $request->status,
                    'jumlah_kegiatan' => $request->jumlahKegiatan,
                    'beban_tugas' => $request->bebanTugas
                ]);
                DB::table('table_simpulan')->where('id_akun', '=', Auth::user()->id)->increment($jenisTabel, $request->bebanTugas);
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

        if($jenisTabel == "pendidikan") {
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas', 'rencana_pertemuan', 'sks_mk_terhitung', 'sks_bkd')->where('id', '=', $request->id)->first();
        } else {
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id', '=', $request->id)->first();
        }

        return response()->json($dataTabel, 200);

    }

    function editData(Request $request, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        if($this->cekBagianTabel($request->editId, $jenisTabel)->bagian_table == "A" && $jenisTabel == "pendidikan") {
            $rules = [  
                'editNamaKegiatan' => 'required',
                'editStatus' => 'required',
                'rencanaPertemuan' => 'required|numeric',
                'editSksMkTerhitung' => 'required|numeric',
                'editSksBkd' => 'required|numeric'
            ];
        } else {
            $rules = [  
                'editNamaKegiatan' => 'required',
                'editStatus' => 'required',
                'editBebanTugas' => 'required|numeric',
                'editJumlahKegiatan' => 'required|numeric'
            ];
        }
            
        $message = [
            'required' => 'Input :attribute tidak boleh kosong',
            'numeric' => 'Input :attribute harus berupa angka'
        ];

        if($this->validate($request, $rules, $message)) {
            if($this->cekBagianTabel($request->editId, $jenisTabel)->bagian_table == "A" && $jenisTabel == "pendidikan") {
                DB::table($namatabel)->where('id', '=', $request->editId)->update([
                    'nama_kegiatan' => $request->editNamaKegiatan,
                    'status' => $request->editStatus,
                    'rencana_pertemuan' => $request->rencanaPertemuan,
                    'sks_mk_terhitung' => $request->editSksMkTerhitung,
                    'sks_bkd' => $request->editSksBkd
                ]);
            } else {

                DB::table($namatabel)->where('id', '=', $request->editId)->update([
                    'nama_kegiatan' => $request->editNamaKegiatan,
                    'jumlah_kegiatan' => $request->editJumlahKegiatan,
                    'beban_tugas' => $request->editBebanTugas,
                    'status' => $request->editStatus
                ]);
            }
        } 
        
        return redirect($this->getUrl($jenisTabel));
    }

    function cekBagianTabel($id, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        return DB::table($namatabel)->select('bagian_table')->where('id', '=', $id)->first();
    }

    function hapusData($jenisTabel, Request $request) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        $bagian = DB::table($namatabel)->where('id', '=', $request->delete_id)->first()->bagian_table;
        
        if ($jenisTabel == "pendidikan" && $bagian == "A") {
            $bebanTugas = DB::table($namatabel)->where('id', '=', $request->delete_id)->first()->sks_bkd;
        } else {
            $bebanTugas = DB::table($namatabel)->where('id', '=', $request->delete_id)->first()->beban_tugas;
        }

        DB::table($namatabel)->delete($request->delete_id);

        DB::table('table_simpulan')->where('id_akun', '=', Auth::user()->id)->decrement($jenisTabel, $bebanTugas);

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
