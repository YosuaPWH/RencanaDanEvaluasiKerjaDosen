@extends('home')

@section('page-title', 'Rencana - Penelitian')
@section('breadcrumb-title', 'Pelaksanaan Penelitian')

@section('konten')
<script>
    function hide(bagian) {
        const idTable = document.getElementById(bagian).classList
        
        if (idTable.contains('d-block')) {
            idTable.replace('d-block', 'd-none')
        } else {
            idTable.replace('d-none', 'd-block')
        }
    }

    function tambahKolom(bagian) {
        const hideId = document.getElementById(bagian).classList
    
        if (hideId.contains('hidden')) {
            hideId.remove('hidden')
        } 
    }
</script>

@include('components.edit_data', ['url' => "/rencana-kerja/penelitian/show-edit-data", 'pelaksanaan' => 'penelitian'])

<div>
    @include('components.tambah_data', array('data' => array(
        'A. Menghasilkan karya ilmiah sesuai dengan bidangnya',
        'B. Hasil penelitian atau hasil pemikiran yang didesiminasikan',
        'C. Hasil penelitian atau pemikiran atau kerjasama industri termasuk penelitian penugasan dari Kementerian atau LPNK yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga',
        'D. Menerjemahkan/menyadur buku ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)',
        'E. Mengedit/menyunting karya ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)',
        'F. Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI',
        'G. Rumusan kebijakan yang monumental dalam bentuk arahan/kertas kebijakan (policy brief/policy paper), naskah akademik, model kebijakan strategis atau rekomendasi kebijakan yang berkontribusi terhadap pengembangan kebijakan dan pembangunan',
        'H. Membuat rancangan dan karya teknologi yang tidak dipatenkan rancangan dan karya seni monumental yang tidak terdaftar di HaKI, tetapi telah dipresentasikan pada forum yang teragenda',
    )), ['jns_table' => 'penelitian'])
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Menghasilkan karya ilmiah sesuai dengan bidangnya</p>
            <button type="button" onclick='hide("bagianA")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianA">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2 ">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonA"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "A")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="A. Menghasilkan karya ilmiah sesuai dengan bidangnya"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonA");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">B. Hasil penelitian atau hasil pemikiran yang didesiminasikan</p>
            <button type="button" onclick='hide("bagianB")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianB">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonB"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "B")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="B. Hasil penelitian atau hasil pemikiran yang didesiminasikan"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonB");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">C. Hasil penelitian atau pemikiran atau kerjasama industri termasuk penelitian penugasan dari Kementerian atau LPNK yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga</p>
            <button type="button" onclick='hide("bagianC")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianC">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonC"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "C")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="C. Hasil penelitian atau pemikiran atau kerjasama industri termasuk penelitian penugasan dari Kementerian atau LPNK yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonC");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">D. Menerjemahkan/menyadur buku ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)</p>
            <button onclick='hide("bagianD")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianD">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonD"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "D")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="D. Menerjemahkan/menyadur buku ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonD");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">E. Mengedit/menyunting karya ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)</p>
            <button onclick='hide("bagianE")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianE">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonE"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "E")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="E. Mengedit/menyunting karya ilmiah yang diterbitkan dan diedarkan secara nasional (Ber-ISBN)"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonE");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">F. Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI</p>
            <button onclick='hide("bagianF")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianF">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonF"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "F")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="F. Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonF");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">G. Rumusan kebijakan yang monumental dalam bentuk arahan/kertas kebijakan (policy brief/policy paper), naskah akademik, model kebijakan strategis atau rekomendasi kebijakan yang berkontribusi terhadap pengembangan kebijakan dan pembangunan</p>
            <button onclick='hide("bagianG")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianG">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonG"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "G")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="G. Rumusan kebijakan yang monumental dalam bentuk arahan/kertas kebijakan (policy brief/policy paper), naskah akademik, model kebijakan strategis atau rekomendasi kebijakan yang berkontribusi terhadap pengembangan kebijakan dan pembangunan"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonG");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">H. Membuat rancangan dan karya teknologi yang tidak dipatenkan rancangan dan karya seni monumental yang tidak terdaftar di HaKI, tetapi telah dipresentasikan pada forum yang teragenda</p>
            <button onclick='hide("bagianH")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianH">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonH"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenelitian as $data)
                        @if ($data->bagian_table == "H")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <a href="javascript:void(0)" class="btn-edit" data-id="{{ $data->id }}" data-nama-tabel="H. Membuat rancangan dan karya teknologi yang tidak dipatenkan rancangan dan karya seni monumental yang tidak terdaftar di HaKI, tetapi telah dipresentasikan pada forum yang teragenda"  onclick="coba(true)">
                                        <button class=" py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    </a>
                                    <a href="penelitian/hapus-data/{{ $data->id }}">
                                        <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @else
                        <script>
                            tambahKolom("bagianButtonH");
                        </script>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection