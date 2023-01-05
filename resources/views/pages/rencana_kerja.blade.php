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
                    <tr>
                        <td class="p-2">2022/2023 Ganjil</td>
                        <td class="p-2">
                            <a href="/rencana-kerja/biodata">
                                <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Lihat Rencana Kerja Dosen</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">2021/2022 Genap</td>
                        <td class="p-2">
                            <a href="/rencana-kerja/pendidikan">
                                <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Lihat Rencana Kerja Dosen</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-2">2021/2022 Ganjil</td>
                        <td class="p-2">
                            <a href="/rencana-kerja/pendidikan">
                                <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Lihat Rencana Kerja Dosen</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection