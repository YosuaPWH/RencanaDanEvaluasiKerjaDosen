<?php

namespace App\Http\Controllers;

use App\Models\TablePendidikan;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CRUDTableController extends Controller
{
    function tambahData(Request $request, $periode, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);
        $url = $this->getUrl($periode, $jenisTabel);

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
                    'sks_bkd' => $request->SksBkd,
                    'periode' => str_replace('&', '/', $periode)
                ]);
            } else {
                DB::table($namatabel)->insert([
                    'id_akun' => Auth::user()->id,
                    'bagian_table' => $request->pelaksanaan,
                    'nama_kegiatan' => $request->namaKegiatan,
                    'status' => $request->status,
                    'jumlah_kegiatan' => $request->jumlahKegiatan,
                    'beban_tugas' => $request->bebanTugas,
                    'periode' => str_replace('&', '/', $periode)
                ]);
            }
        } 

        $this->updateSimpulan(str_replace('&', '/', $periode));

        return redirect($url);
    }

    
    function tampilData($periode, $jenisPelaksanaan) {

        $periodeFix = str_replace('&', '/', $periode);

        $this->updateSimpulan($periodeFix);

        if ($jenisPelaksanaan == "pendidikan") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
                    
            $tabelDataPendidikan = DB::table($namatabel)
                ->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas', 'rencana_pertemuan', 'sks_mk_terhitung', 'sks_bkd')
                ->where('id_akun', '=', Auth::user()->id)
                ->where('periode', '=', $periodeFix)
                ->get();
            
            return view('pages.pel_pendidikan')->with('datapendidikan', $tabelDataPendidikan);
            
        } else if ($jenisPelaksanaan == "penelitian") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)
                ->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')
                ->where('id_akun', '=', Auth::user()->id)
                ->where('periode', '=', $periodeFix)
                ->get();
                        
            return view('pages.pel_penelitian')->with('datapenelitian', $dataTabel);
            
        } else if ($jenisPelaksanaan == "pengabdian") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)
                ->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')
                ->where('id_akun', '=', Auth::user()->id)
                ->where('periode', '=', $periodeFix)
                ->get();

            return view('pages.pel_pengabdian')->with('datapengabdian', $dataTabel);
            
        } else if ($jenisPelaksanaan == "penunjang") {
            $namatabel = $this->getNamaTabel($jenisPelaksanaan);
        
            $dataTabel = DB::table($namatabel)
                ->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')
                ->where('id_akun', '=', Auth::user()->id)
                ->where('periode', '=', $periodeFix)
                ->get();

            return view('pages.pel_penunjang')->with('datapenunjang', $dataTabel);
            
        } else {
            return view('errors.404');
        }
    }

    function showEditData(Request $request, $periode, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        if($jenisTabel == "pendidikan") {
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas', 'rencana_pertemuan', 'sks_mk_terhitung', 'sks_bkd')->where('id', '=', $request->id)->first();
        } else {
            $dataTabel = DB::table($namatabel)->select('id', 'bagian_table', 'nama_kegiatan', 'status', 'jumlah_kegiatan', 'beban_tugas')->where('id', '=', $request->id)->first();
        }

        return response()->json($dataTabel, 200);

    }

    function editData(Request $request, $periode, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);
        $periodeFix = str_replace('&', '/', $periode);

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

        $this->updateSimpulan($periodeFix);
        
        return redirect($this->getUrl($periode, $jenisTabel));
    }

    function tampilSimpulan($periode) {
        $periodeFix = str_replace('&', '/', $periode);
        $this->updateSimpulan($periodeFix);

        $dataTabel = DB::table('table_simpulan')
            ->select('pendidikan', 'penelitian', 'pengabdian', 'penunjang')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->first();

        return view('pages.simpulan')->with('data', $dataTabel);
    }   

    function updateSimpulan($periodeFix) {
        $cekApakahAdaIdDiSimpulan = DB::table('table_simpulan')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->first();
        
        if ($cekApakahAdaIdDiSimpulan == null) {
            DB::table('table_simpulan')->insert([
                'id_akun' => Auth::user()->id,
                'pendidikan' => 0,
                'penelitian' => 0,
                'pengabdian' => 0,
                'penunjang' => 0,
                'periode' => $periodeFix
            ]);
        }

        $sksDataPendidikan = DB::table('table_pendidikan')
            ->select('sks_bkd', 'beban_tugas')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix);

        $sksPendidikan = $sksDataPendidikan->sum('sks_bkd') + $sksDataPendidikan->sum('beban_tugas');

        $sksPenelitian = DB::table('table_penelitian')
            ->select('beban_tugas')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->sum('beban_tugas');

        $sksPengabdian = DB::table('table_pengabdian')
            ->select('beban_tugas')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->sum('beban_tugas');

        $sksPenunjang = DB::table('table_penunjang')
            ->select('beban_tugas')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->sum('beban_tugas');


        DB::table('table_simpulan')
            ->where('id_akun', '=', Auth::user()->id)
            ->where('periode', '=', $periodeFix)
            ->update([
                'pendidikan' => $sksPendidikan,
                'penelitian' => $sksPenelitian,
                'pengabdian' => $sksPengabdian,
                'penunjang' => $sksPenunjang
        ]);
    }

    function cekBagianTabel($id, $jenisTabel) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        return DB::table($namatabel)->select('bagian_table')->where('id', '=', $id)->first();
    }

    function hapusData($periode, $jenisTabel, Request $request) {
        $namatabel = $this->getNamaTabel($jenisTabel);

        DB::table($namatabel)->delete($request->delete_id);
        $this->updateSimpulan(str_replace('&', '/', $periode));

        return redirect($this->getUrl($periode, $jenisTabel));
    }

    function getUrl($periode, $jenisTabel) {

        if ($jenisTabel == "pendidikan") {
            return "/rencana-kerja/".$periode."/pendidikan";
        } else if($jenisTabel == "penelitian") {
            return "/rencana-kerja/".$periode."/penelitian";
        } else if($jenisTabel == "pengabdian") {
            return "/rencana-kerja/".$periode."/pengabdian";
        } else {
            return "/rencana-kerja/".$periode."/penunjang";
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
