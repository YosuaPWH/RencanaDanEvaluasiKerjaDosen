@extends('home')

@section('page-title', 'Rencana - Pendidikan')
@section('breadcrumb-title', 'Pelaksanaan Pendidikan')

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
</script>
<div>
    @include('components.tambah_data', array('data' => array(
        'A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan',
        'B. Membimbing Seminar',
        'C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan',
        'D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya',
        'E. Bertugas sebagai penguji pada ujian akhir/profesi',
        'F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan',
        'G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)',
        'H. Mengembangkan bahan kuliah',
        'I. Menyampaikan orasi ilmiah',
        'J. Menduduki jabatan pimpinan perguruan tinggi',
        'K. Membimbing dosen yang lebih rendah jabatannya',
        'L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi',
        'M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian',
        'N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi'
    )), ['jns_table' => 'pendidikan'])
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan</p>
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
                        <th class="p-2 border-r-2">Rencana Pertemuan</th>
                        <th class="p-2 border-r-2 ">SKS MK Terhitung</th>
                        <th class="p-2 border-r-2">SKS BKD</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2">Status Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "A")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->rencana_pertemuan }}</td>
                                <td class="p-2">{{ $data->sks_mk_terhitung }}</td>
                                <td class="p-2">{{ $data->sks_bkd }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">B. Membimbing Seminar</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "B")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif     
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "C")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "D")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">E. Bertugas sebagai penguji pada ujian akhir/profesi</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "E")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "F")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "G")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">H. Mengembangkan bahan kuliah</p>
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
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "H")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">I. Menyampaikan orasi ilmiah</p>
            <button onclick='hide("bagianI")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianI">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "I")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">J. Menduduki jabatan pimpinan perguruan tinggi</p>
            <button onclick='hide("bagianJ")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianJ">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "J")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">K. Membimbing dosen yang lebih rendah jabatannya</p>
            <button onclick='hide("bagianK")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianK">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "K")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi</p>
            <button onclick='hide("bagianL")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianL">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "L")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian</p>
            <button onclick='hide("bagianM")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianM">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "M")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi</p>
            <button onclick='hide("bagianN")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto d-block" id="bagianN">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Nama Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <span class="hidden">{{ $byk = 0 }}</span>
                    @foreach ($datapendidikan as $data)
                        @if ($data->bagian_table == "N")
                            <tr>
                                <td class="p-2">{{ $byk+=1 }}</td>
                                <td class="p-2">{{ $data->nama_kegiatan }}</td>
                                <td class="p-2">{{ $data->status }}</td>
                                <td class="p-2">{{ $data->jumlah_kegiatan }}</td>
                                <td class="p-2">{{ $data->beban_tugas + 0 }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if ($byk == 0)
                        <tr>
                            <td colspan="7" class="text-center p-3 bg-blue-200">
                                Belum ada datang yang di klaim
                            </td>
                        </tr>
                    @endif  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection