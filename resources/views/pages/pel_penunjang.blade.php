@extends('home')

@section('page-title', 'Rencana - Penunjang')
@section('breadcrumb-title', 'Pelaksanaan Penunjang')

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
        'A. Menjadi anggota dalam suatu panitia/badan pada perguruan tinggi',
        'B. Menjadi anggota panitia/badan pada lembaga pemerintah',
        'C. Menjadi anggota organisasi profesi',
        'D. Mewakili perguruan tinggi/lembaga pemerintah',
        'E. Menjadi anggota delegasi nasional ke pertemuan internasional',
        'F. Berperan serta aktif dalam pertemuan ilmiah',
        'G. Mendapat penghargaan/tanda jasa',
        'H. Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional',
        'I. Mempunyai prestasi di bidang olahraga/humaniora',
        'J. Keanggotaan dalam tim penilai/kegiatan lainnya dari Kementerian'
    )), ['jns_table' => 'penunjang'])
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Menjadi anggota dalam suatu panitia/badan pada perguruan tinggi</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "A")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">B. Menjadi anggota panitia/badan pada lembaga pemerintah</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "B")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">C. Menjadi anggota organisasi profesi</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "C")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">D. Mewakili perguruan tinggi/lembaga pemerintah</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "D")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">E. Menjadi anggota delegasi nasional ke pertemuan internasional</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "E")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">F. Berperan serta aktif dalam pertemuan ilmiah</p>
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
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "F")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">G. Mendapat penghargaan/tanda jasa</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonG"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "G")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
            <p class="font-semibold">H. Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonH"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "H")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">I. Mempunyai prestasi di bidang olahraga/humaniora</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonI"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "I")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
                            tambahKolom("bagianButtonI");
                        </script>
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">J. Keanggotaan dalam tim penilai/kegiatan lainnya dari Kementerian</p>
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
                        <th class="p-2 border-r-2 hidden w-2/12" id="bagianButtonJ"></th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapenunjang as $data)
                        @if ($data->bagian_table == "J")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                                <td class="p-2">
                                    <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</button>
                                    <button class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-2 outline-1 outline border-red-600 rounded">Hapus</button>
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
                            tambahKolom("bagianButtonJ");
                        </script>
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection