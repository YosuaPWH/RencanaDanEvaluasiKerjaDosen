@extends('home')

@section('konten')
<script>
    function hide(bagian) {
        let aa = document.getElementById(bagian).style.display
        
        if (aa == "block") {
            document.getElementById(bagian).style.display = "none";
        } else {
            document.getElementById(bagian).style.display = "block";
        }
    }
</script>
<div>
    <div class="bg-white rounded-lg p-2 border mb-2">
        <div class="mb-2 flex justify-between">
            <p class="font-semibold">A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan</p>
            <button type="button" onclick='hide("bagianA")' class="p-3">
                <i class="bi bi-chevron-up"></i>
            </button>
        </div>
        <div class="border rounded-lg overflow-auto" id="bagianA" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Rencana Pertemuan</th>
                        <th class="p-2 border-r-2 ">SKS MK Terhitung</th>
                        <th class="p-2 border-r-2">SKS BKD</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2">Status Penilaian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianB" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianC" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianD" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianE" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianF" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianG" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianH" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianI" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianJ" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianK" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianL" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianM" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
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
        <div class="border rounded-lg overflow-auto" id="bagianN" style="display: block;">
            <table class="w-full ">
                <thead>
                    <tr class="bg-theme-4">
                        <th class="p-2 border-r-2 w-1">No</th>
                        <th class="p-2 border-r-2 w-2/6">Kegiatan</th>
                        <th class="p-2 border-r-2">Status</th>
                        <th class="p-2 border-r-2">Jumlah Kegiatan</th>
                        <th class="p-2 border-r-2">Beban Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center p-3 bg-blue-200">
                            Belum ada datang yang di klaim
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection