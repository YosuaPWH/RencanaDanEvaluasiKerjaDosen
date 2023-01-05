@extends('home')

@section('page-title', 'Simpulan')
@section('breadcrumb-title', 'Simpulan')
@section('periode', '- Semester Genap 2022/2023')


@section('konten')
@include('components.nav_rencana_kerja')
<div class="bg-white rounded-lg p-2 border mb-2">
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="border rounded-lg overflow-auto">
            <table class="w-full ">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="p-2">Kewajiban Beban Kerja Dosen (BKD)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2">
                            <div class="w-full bg-blue-300 rounded p-2">
                                <h5 class="font-bold">Keterangan:</h5>
                                <ul class="list-disc mb-0">
                                    <li><strong>TM</strong>: Tidak Memenuhi</li>
                                    <li><strong>M</strong>: Memenuhi</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">
                            <div class="border rounded-lg overflow-auto">
                                <table class="w-full ">
                                    <thead>
                                        <tr class="bg-theme-4">
                                            <th class="p-2 border-r-2 w-1">No</th>
                                            <th class="p-2 border-r-2 w-3/6">Jenis Kerja</th>
                                            <th class="p-2 border-r-2">Syarat</th>
                                            <th class="p-2 border-r-2">SKS BKD</th>
                                            <th class="p-2 border-r-2">SKS Lebih</th>
                                            <th class="p-2 border-r-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2">1</td>
                                            <td class="p-2">Pelaksanaan Pendidikan</td>
                                            <td class="p-2">Tidak boleh kosong</td>
                                            <td class="p-2">{{ $data->pendidikan + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">2</td>
                                            <td class="p-2">Pelaksanaan Penelitian</td>
                                            <td class="p-2">Tidak boleh kosong</td>
                                            <td class="p-2">{{ $data->penelitian + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">3</td>
                                            <td class="p-2">Pelaksanaan Pengabdian</td>
                                            <td class="p-2">Tidak boleh kosong</td>
                                            <td class="p-2">{{ $data->pengabdian + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">4</td>
                                            <td class="p-2">Pelaksanaan Penunjang</td>
                                            <td class="p-2">Tidak boleh kosong</td>
                                            <td class="p-2">{{ $data->penunjang + 0}}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr class="bg-yellow-100 italic">
                                            <td class="p-2"></td>
                                            <td class="p-2">Kriteria Pelaksanaan Pendidikan dan Pelaksanaan Penelitian</td>
                                            <td class="p-2">Minimal 9 SKS</td>
                                            <td class="p-2">{{ (float)$data->pendidikan + (float)$data->penelitian + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr class="bg-yellow-100 italic">
                                            <td class="p-2"></td>
                                            <td class="p-2">Kriteria Pelaksanaan Pengabdian dan Pelaksanaan Penunjang</td>
                                            <td class="p-2">Tidak boleh kosong</td>
                                            <td class="p-2">{{ (float)$data->pengabdian + (float)$data->penunjang + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                        <tr class="bg-blue-300">
                                            <td class="p-2" colspan="2">Total Kinerja</td>
                                            <td class="p-2">Minimal 12 SKS dan Maksimal 16 SKS</td>
                                            <td class="p-2">{{ (float)$data->pendidikan + (float)$data->penelitian + (float)$data->pengabdian + (float)$data->penunjang + 0 }}</td>
                                            <td class="p-2">0</td>
                                            <td class="p-2">M</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection