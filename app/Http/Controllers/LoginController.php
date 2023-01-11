<?php

namespace App\Http\Controllers;

use App\Helpers\AuthUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function login(Request $request){
        $username = $request->usernameLogin;
        $password = $request->passwordLogin;


        // Mekanisme test admin 
        // Saat akan ke tahap production, maka mekanisme ini akan dihapuskan dan akan digantikan mekanisme method loginAdmin()
        if ($username == "admin" && $password == "admin") {
            $request->session()->regenerate();

            $dataAdmin = new User;
            $dataAdmin->id = 100;
            $dataAdmin->nama = "Admin";
            $dataAdmin->role = "admin";

            $cekApakahAdaId = User::where('id', '=', 100)->exists();
            if (!$cekApakahAdaId) {
                $dataAdmin->save();
            }

            Auth::login($dataAdmin);

            return redirect('/');
        }


        $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
            'username' => $username,
            'password' => $password
        ])->body();

        $json = json_decode($response, true);

        if ($json['result'] == true) {

            if ($json['user']['role'] == "Staff") { 
                $request->session()->regenerate();
                return $this->loginAdmin($json);   // LOGIN ADMIN
            } else if ($json['user']['role'] == "Dosen") {
                $request->session()->regenerate();
                return $this->loginDosen($json); // LOGIN DOSEN
            } 
        } 
            
        return Redirect::back()
            ->withInput()
            ->withErrors(['password' => 'salah']);
    }

    function loginAdmin($json) {
        $token = $json['token'];
        $userId = $json['user']['user_id'];

        $responseDataAdmin = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?userid='.$userId)->body();
        $jsonDataAdmin = json_decode($responseDataAdmin, true);

        $nama = $jsonDataAdmin['data']['pegawai'][0]['nama'];

        $dataAdmin = new User;
        $dataAdmin->id = $userId;
        $dataAdmin->nama = $nama;
        $dataAdmin->role = "admin";

        $cekApakahAdaId = User::where('id', '=', $userId)->exists();
        if (!$cekApakahAdaId) {
            $dataAdmin->save();
        }

        Auth::login($dataAdmin);

        return redirect('/');
    }

    function loginDosen($json) {
        $token = $json['token'];
        $userId = $json['user']['user_id'];

        $responseDataDosen = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/dosen?userid='.$userId)->body();
        $jsonDataDosen = json_decode($responseDataDosen, true);

        $nama = $jsonDataDosen['data']['dosen'][0]['nama'];
        $prodi = $jsonDataDosen['data']['dosen'][0]['prodi'];
        $email = $jsonDataDosen['data']['dosen'][0]['email'];
        $nidn = $jsonDataDosen['data']['dosen'][0]['nidn'];
        $nip = $jsonDataDosen['data']['dosen'][0]['nip'];   
        $jabatanFungsional = $jsonDataDosen['data']['dosen'][0]['jabatan_akademik_desc'];
        $pegawaiId = $jsonDataDosen['data']['dosen'][0]['pegawai_id'];


        $responseStatusKeaktifan = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/pegawai?pegawaiid='.$pegawaiId)->body();
        $jsonKeaktifan = json_decode($responseStatusKeaktifan, true);
        $keaktifanDosen = $jsonKeaktifan['data']['pegawai'][0]['status_pegawai'];

        $cekApakahAdaId = User::where('id', '=', $userId)->exists();

        $dataUser = new User;
        $dataUser->id = $userId;
        $dataUser->nama = $nama;
        $dataUser->prodi = $prodi;
        $dataUser->email = $email;
        $dataUser->nidn = $nidn;
        $dataUser->nip = $nip;
        $dataUser->jabatan_fungsional = $jabatanFungsional;
        $dataUser->keaktifan = $keaktifanDosen;
        $dataUser->role = "dosen";

        // Cek apakah data sudah ada di dalam database, jika belum akan dibuat data baru di dalam database
        if (!$cekApakahAdaId) {
            $dataUser->save();
        }

        Auth::login($dataUser);
        return redirect('/');
    }

    function returnPage() {
        if (Auth::user()->role == "dosen") {   
            $dataPeriode = DB::table('table_periode')->select('id', 'periode', 'status')->get();

            return view('pages.rencana_kerja')->with('periode', $dataPeriode);
        } else {
            $dataPeriode = DB::table('table_periode')->select('id', 'periode', 'status')->get();

            return view('pages.admin')->with('periode', $dataPeriode);
        }
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/');
    }

}
