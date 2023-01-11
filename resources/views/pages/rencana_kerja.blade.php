@extends('home')

@section('page-title', 'Rencana Kerja')

@section('konten')
<div class="bg-white rounded-lg p-2 border mb-2">
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="border rounded-lg overflow-auto">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-2/6">Semester</th>
                        <th class="p-2 ">Rencana</th>
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
                                    <a href="/rencana-kerja/{{ str_replace('/', '&', $data->periode) }}/biodata">
                                        <button type="submit" class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Lihat Rencana Kerja Dosen</button>
                                    </a>
                                @else
                                    <button class="py-2 px-3 bg-blue-500 opacity-50 text-white rounded" disabled>Lihat Rencana Kerja Dosen</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection