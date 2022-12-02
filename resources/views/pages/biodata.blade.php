@extends('home')

@section('konten')
<div class=" mb-1 w-fit ml-auto">
    @include('components.setting_biodata')
</div>
<div class="sm:rounded-lg p-3 bg-white border">
    <table class="w-full rounded-lg">
        <tr class="font-medium bg-gray-200">
            <th class="p-2">
                Nama
            </th>
            <td class="w-4/6">
                {{$nama}}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                NIP
            </th>
            <td class="w-4/6">
                {{$nip}}
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                NIDN
            </th>
            <td class="w-4/6">
                {{$nidn}}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Fakultas
            </th>
            <td class="w-4/6">
                @if ($prodi == 'S1 Informatika' || $prodi == 'S1 Sistem Informasi' || $prodi == 'S1 Teknik Elektro')
                Fakultas Informatika dan Teknik Elektro
                @elseif ($prodi == 'S1 Manajemen Rekayasa')
                Fakultas Teknik Industri
                @elseif ($prodi == 'S1 Teknik Bioproses')
                Fakultas Bioteknologi
                @elseif ($prodi == 'DIII Teknologi Kompoter' || $prodi == 'DII Teknologi Informasi' || $prodi == 'DIV Teknologi Rekayasa Perangkat Lunak')
                Fakultas Vokasi
                @endif   
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Program Studi
            </th>
            <td class="w-4/6">
                {{$prodi}}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Status Dosen
            </th>
            <td class="w-4/6">
                -
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Jabatan Fungsional
            </th>
            <td class="w-4/6">
                {{$jabatanFungsional}}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Jabatan
            </th>
            <td class="w-4/6">
                -
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Status Serdos
            </th>
            <td class="w-4/6">
                -
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Nomor Sertifikasi
            </th>
            <td class="w-4/6">
                -
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Status Keaktifan
            </th>
            <td class="w-4/6">
                @if ($keaktifan == 'A')
                Aktif
                @else
                Keluar
                @endif
            </td>
        </tr>
    </table>
</div>
@endsection