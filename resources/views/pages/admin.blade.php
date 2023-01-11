@extends('home')

@section('page-title', 'Periode Rencana Kerja')
@section('breadcrumb-title', 'Periode Rencana Kerja')


@section('konten')

@include('components.delete_periode')
<div class="sm:rounded-lg p-3 bg-white border">
    @include('components.tambah_periode')
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
                @foreach ($periode as $data)
                    <tr>
                        <td class="p-2">
                            Rencana Kerja Dosen  {{ explode("-", $data->periode)[0] }}
                            @if (explode("-", $data->periode)[1] == "1")
                                Ganjil
                            @else
                                Genap
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($data->status == "aktif")
                                <button type="button" class="text-white bg-green-500 font-medium rounded-lg text-sm py-2 px-3 text-center" disabled>Aktif</button>
                            @else
                                <button type="button" class="text-white bg-yellow-500 font-medium rounded-lg text-sm py-2 px-3 text-center" disabled>Sudah berakhir</button>
                            @endif
                        </td>
                        <td class="p-2 gap-3 flex">
                            @if ($data->status == "aktif")
                                <form action="tutup-periode" method="POST">
                                    @csrf
                                    <input type="text" name="idperiode" id="idperiode" value="{{ $data->id }}" hidden>
                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm py-2 px-3 text-center">Tutup periode</button>
                                </form>
                            @else
                                <form action="buka-periode" method="POST">
                                    @csrf
                                    <input type="text" name="idperiode" id="idperiode" value="{{ $data->id }}" hidden>
                                    <button type="submit" class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-lg text-sm py-2 px-3 text-center">Buka periode</button>
                                </form>
                            @endif
                            <a href="javascript:vodi(0)" class="btn-hapus" data-id="{{ $data->id }}" onclick="hapus(true)">
                                <button type="submit" class="hover:bg-red-500 text-red-500 font-medium text-sm hover:text-white py-2 px-3 focus:bg-red-500 focus:text-white outline-1 outline border-red-600 rounded-lg">Hapus periode</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection