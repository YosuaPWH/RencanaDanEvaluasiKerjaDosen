@extends('home')

@section('page-title', 'Rencana - Pengabdian')
@section('breadcrumb-title', 'Pelaksanaan Pengabdian')

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
<div>
    @include('components.tambah_data', array('data' => array(
        'A. Melaksanakan pengembangan hasil pendidikan dan penelitian',
        'B. Memberi latihan/penyuluhan/penataran/ceramah/pendampingan pada masyarakat, terjadwal/terprogram',
        'C. Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum pemerintah dan pembangunan',
        'D. Membuat/menulis karya pengabdian pada masyarakat yang dipublikasikan',
        'E. Hasil kegiatan pengabdian masyarakat yang dipublikasikan di sebuah berkala/jurnal ilmiah pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya',
        'F. Berperan serta aktif dalam pengelolaan jurnal ilmiah'
    )), ['jns_table' => 'pengabdian'])
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Melaksanakan pengembangan hasil pendidikan dan penelitian</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "A")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
            <p class="font-semibold">B. Memberi latihan/penyuluhan/penataran/ceramah/pendampingan pada masyarakat, terjadwal/terprogram</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "B")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
            <p class="font-semibold">C. Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum pemerintah dan pembangunan</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "C")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
            <p class="font-semibold">D. Membuat/menulis karya pengabdian pada masyarakat yang dipublikasikan</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "D")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
            <p class="font-semibold">E. Hasil kegiatan pengabdian masyarakat yang dipublikasikan di sebuah berkala/jurnal ilmiah pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "E")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
            <p class="font-semibold">F. Berperan serta aktif dalam pengelolaan jurnal ilmiah</p>
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
                    @foreach ($datapengabdian as $data)
                        @if ($data->bagian_table == "F")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <a href="pengabdian/hapus-data/{{ $data->id }}">
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
</div>
@endsection