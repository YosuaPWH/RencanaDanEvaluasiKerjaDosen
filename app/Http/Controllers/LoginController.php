<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function login(Request $request){

        $username = $request->usernameLogin;
        $password = $request->passwordLogin;


        $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
            'username' => $username,
            'password' => $password
        ])->body();

        $json = json_decode($response, true);

        if ($json['result'] == true) {
            $token = $json['token'];

            return $this->getDataDosen($json['user']['user_id'], $token);
        } else {
            return Redirect::back()
                ->withInput()
                ->withErrors(['password' => 'salah']);
        }
    }

    function getDataDosen($userId, $token) {
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

        return view('pages.biodata', [
            'nama' => $nama, 
            'prodi' => $prodi, 
            'email' => $email, 
            'nidn' => $nidn, 
            'nip' => $nip,
            'jabatanFungsional' => $jabatanFungsional,
            'keaktifan' => $keaktifanDosen,
        ]);
    }

    function pendidikan() {
        return view('pendidikan', [
            'nama' => 'dwa',
        ]);
    }

}
