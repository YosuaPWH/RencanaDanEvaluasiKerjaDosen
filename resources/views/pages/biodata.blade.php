@extends('home')

@section('page-title', 'Biodata')
@section('breadcrumb-title', 'Biodata')
@section('periode', '- Semester Genap 2022/2023')

@section('konten')
@include('components.nav_rencana_kerja')

<div class=" mb-1 w-fit ml-auto">
    @include('components.setting_biodata')
</div>
<div class="sm:rounded-lg p-3 bg-white border">
    <table class="w-full rounded-lg">
        <tr class="font-medium bg-gray-200">
            <th class="p-2">
                {{-- Nama --}}
                {{ Auth::user()->periode }}
            </th>
            <td class="w-4/6">
                {{ Auth::user()->nama }}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                NIP
            </th>
            <td class="w-4/6">
                {{ Auth::user()->nip }}
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                NIDN
            </th>
            <td class="w-4/6">
                {{ Auth::user()->nidn }}
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Fakultas
            </th>
            <td class="w-4/6">
                @if (Auth::user()->prodi == 'S1 Informatika' || Auth::user()->prodi == 'S1 Sistem Informasi' || Auth::user()->prodi == 'S1 Teknik Elektro')
                Fakultas Informatika dan Teknik Elektro
                @elseif (Auth::user()->prodi == 'S1 Manajemen Rekayasa')
                Fakultas Teknik Industri
                @elseif (Auth::user()->prodi == 'S1 Teknik Bioproses')
                Fakultas Bioteknologi
                @elseif (Auth::user()->prodi == 'DIII Teknologi Kompoter' || Auth::user()->prodi == 'DII Teknologi Informasi' || Auth::user()->prodi == 'DIV Teknologi Rekayasa Perangkat Lunak')
                Fakultas Vokasi
                @endif   
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Program Studi
            </th>
            <td class="w-4/6">
                @if (Auth::user()->prodi != null)
                    {{Auth::user()->prodi}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Status Dosen
            </th>
            <td class="w-4/6">
                @if (Auth::user()->status != null)
                    {{Auth::user()->status}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Jabatan Fungsional
            </th>
            <td class="w-4/6">
                @if (Auth::user()->jabatan_fungsional)
                    {{Auth::user()->jabatan_fungsional}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Jabatan
            </th>
            <td class="w-4/6">
                @if (Auth::user()->jabatan != null)
                    {{Auth::user()->jabatan}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Status Serdos
            </th>
            <td class="w-4/6">
                @if (Auth::user()->status_serdos != null) 
                    {{Auth::user()->status_serdos}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b">
            <th class="p-2">
                Nomor Sertifikasi
            </th>
            <td class="w-4/6">
                @if (Auth::user()->nomor_sertifikasi != null) 
                    {{Auth::user()->nomor_sertifikasi}}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr class="border-b bg-gray-200">
            <th class="p-2">
                Status Keaktifan
            </th>
            <td class="w-4/6">
                @if (Auth::user()->keaktifan == 'A')
                    Aktif
                @else
                    Keluar
                @endif
            </td>
        </tr>
    </table>
</div>
@endsection