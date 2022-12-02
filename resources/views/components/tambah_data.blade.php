<button type="button" data-modal-toggle="tambahData" class="p-2 text-white rounded bg-green-500 font-medium hover:bg-green-600 mb-2">
    <i class="bi bi-plus-lg"></i>
    Tambah Data
</button>

<script>
    $(document).ready(function() {
        $("#pel").select2({dropdownCssClass : 'bigdrop'});
    });
</script>


<div id="tambahData" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="shadow-lg  hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white">
        {{-- Modal Content --}}
        <div class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
            {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Tambah Data</h3>
                <button type="button" data-modal-toggle="tambahData">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form action="#">
                <div>
                    <div class="mb-4">
                        <select name="pelaksanaan" id="pel" style="width: 100%">
                            <option selected>-- Pilih Pelaksanaan --</option>
                            <option value="A">A. Melaksanakan perkuliahan (tutorial tatap muka, dan/atau daring) dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel/studio/kebun (tatap muka dan/atau daring) pada institusi pendidikan sesuai penugasan</option>
                            <option value="B">B. Membimbing Seminar</option>
                            <option value="C">C. Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan</option>
                            <option value="D">D. Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai dengan bidang tugasnya</option>
                            <option value="E">E. Bertugas sebagai penguji pada ujian akhir/profesi</option>
                            <option value="F">F. Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik, membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan</option>
                            <option value="G">G. Melakukan kegiatan pengembangan program kuliah tatap muka/daring (RPS, perangkat pembelajaran)</option>
                            <option value="H">H. Mengembangkan bahan kuliah</option>
                            <option value="I">I. Menyampaikan orasi ilmiah</option>
                            <option value="J">J. Menduduki jabatan pimpinan perguruan tinggi</option>
                            <option value="K">K. Membimbing dosen yang lebih rendah jabatannya</option>
                            <option value="L">L. Melaksanakan kegiatan Detasering dan Pencangkokan di luar institusi</option>
                            <option value="M">M. Melaksanakan kegiatan pendampingan mahasiswa di luar institusi sesuai kebijakan Kementerian</option>
                            <option value="N">N. Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi/memperoleh sertifikasi profesi</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" name="tambahKegiatan" id="tambahKegiatan" class="form-control">
                    </div>
                    <div class="flex justify-between gap-3">
                        <div>
                            <label for="status">Status</label>
                            <input type="text" name="status" id="tambahStatus" class="form-control">
                        </div>
                        <div>
                            <label for="bebanTugas">Beban Tugas</label>
                            <input type="text" name="tambahBebanTugas" id="tambahBebanTugas" class="form-control">
                        </div>
                        <div>
                            <label for="jlhKegiatan">Jumlah Kegiatan</label>
                            <input type="text" name="tambahJlhKegiatan" id="tambahJlhKegiatan" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" data-modal-toggle="tambahData" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>