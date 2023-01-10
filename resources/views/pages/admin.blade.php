@extends('home')

@section('page-title', 'Periode Rencana Kerja')
@section('breadcrumb-title', 'Periode Rencana Kerja')


@section('konten')
<div class="sm:rounded-lg p-3 bg-white border">
    @include('components.buka_periode')
    <div class="border rounded-lg overflow-auto">
        <table class="w-full ">
            <thead>
                <tr class="bg-theme-4">
                    <th class="p-2 border-r-2 w-2/6">Nama Periode Kegiatan</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-2">Rencana Kerja Dosen 2022/2023 Ganjil</td>
                    <td class="p-2">
                        <button type="button" class="text-white bg-green-500 font-medium rounded-lg text-sm py-2 px-3 text-center" disabled>Aktif</button>
                    </td>
                    <td class="p-2"></td>
                </tr>
                <tr>
                    <td class="p-2">Rencana Kerja Dosen 2022/2023 Genap</td>
                    <td class="p-2">
                        <button type="button" class="text-white bg-green-500 font-medium rounded-lg text-sm py-2 px-3 text-center" disabled>Aktif</button>
                    </td>
                    <td class="p-2">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection