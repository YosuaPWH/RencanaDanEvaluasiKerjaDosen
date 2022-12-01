<button data-dropdown-toggle="ubah-data" class="p-1 hover:bg-whitety rounded-lg" type="button" data-dropdown-placement="left">
    <svg class="w-4 h-4 hover:fill-slate-900" data-dropdown-toggle="ubah-data" viewBox="0 0 27 29" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><path d="M23.3438 15.81C23.4005 15.36 23.4288 14.895 23.4288 14.4C23.4288 13.92 23.4005 13.44 23.3297 12.99L26.2055 10.62C26.4605 10.41 26.5313 10.005 26.3755 9.705L23.6555 4.725C23.4855 4.395 23.1313 4.29 22.8197 4.395L19.4338 5.835C18.7255 5.265 17.9747 4.785 17.1388 4.425L16.6288 0.615C16.5722 0.255 16.2888 0 15.9488 0H10.5088C10.1688 0 9.89967 0.255 9.843 0.615L9.333 4.425C8.49717 4.785 7.73217 5.28 7.038 5.835L3.65217 4.395C3.3405 4.275 2.98633 4.395 2.81633 4.725L0.1105 9.705C-0.0594995 10.02 -0.002833 10.41 0.2805 10.62L3.15633 12.99C3.0855 13.44 3.02883 13.935 3.02883 14.4C3.02883 14.865 3.05717 15.36 3.128 15.81L0.252167 18.18C-0.00283298 18.39 -0.0736661 18.795 0.0821672 19.095L2.80217 24.075C2.97217 24.405 3.32633 24.51 3.638 24.405L7.02383 22.965C7.73217 23.535 8.483 24.015 9.31883 24.375L9.82883 28.185C9.89967 28.545 10.1688 28.8 10.5088 28.8H15.9488C16.2888 28.8 16.5722 28.545 16.6147 28.185L17.1247 24.375C17.9605 24.015 18.7255 23.535 19.4197 22.965L22.8055 24.405C23.1172 24.525 23.4713 24.405 23.6413 24.075L26.3613 19.095C26.5313 18.765 26.4605 18.39 26.1913 18.18L23.3438 15.81ZM13.2288 19.8C10.4238 19.8 8.12883 17.37 8.12883 14.4C8.12883 11.43 10.4238 9 13.2288 9C16.0338 9 18.3288 11.43 18.3288 14.4C18.3288 17.37 16.0338 19.8 13.2288 19.8Z" /></svg>
</button>

{{-- Dropdown Ubah Data Biodata --}}

<a href="#" data-modal-toggle="updateBiodata" class="text-xs p-2 hover:bg-bluedesign hover:text-whitety bg-whitety text-decoration-none hidden rounded-lg" id="ubah-data">
    Ubah data
</a>

<div id="updateBiodata" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="shadow hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white">
        {{-- Modal Content --}}
        <div class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
            {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Ubah Biodata</h3>
                <button type="button" data-modal-toggle="updateBiodata">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form action="#">
                <div>
                    <div class="mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" name="ubahNama" id="nama" class="form-control">
                    </div>
                    <div class="flex mb-2 justify-between gap-3">
                        <div>
                            <label for="nip">NIP</label>
                            <input type="text" name="ubahNIP" id="nip" class="form-control">
                        </div>
                        <div>
                            <label for="nidn">NIDN</label>
                            <input type="text" name="ubahNIDN" id="nidn" class="form-control">
                        </div>
                        <div>
                            <label for="prodi">Program Studi</label>
                            {{-- <input type="text" name="ubahProdi" id="prodi" class="form-control"> --}}
                            <select name="" id="prodi" class="form-select">
                                <option value="ti">D3 Teknologi Informasi</option>
                                <option value="tk">D3 Teknologi Komputer</option>
                                <option value="trpl">D4 Teknologi Rekayasa Perangkat Lunak</option>
                                <option value="if">S1 Informatika</option>
                                <option value="si">S1 Sistem Informasi</option>
                                <option value="te">S1 Teknik Elektro</option>
                                <option value="bp">S1 Teknik Bioproses</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="statusdosen">Status Dosen</label>
                        <input type="text" name="statusdosen" id="statusdosen" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="jabatanfungsional">Jabatan Fungsional</label>
                        <input type="text" name="jabatanfungsional" id="jabatanfungsional" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                    </div>
                    <div class="flex mb-2 gap-3">
                        <div class="w-1/2">
                            <label for="statusserdos">Status Serdos</label>
                            <input type="text" name="ubahSerdos" id="statusserdos" class="form-control w-full">
                        </div>
                        <div class="w-1/2">
                            <label for="sertifikasi">Nomor Sertifikasi</label>
                            <input type="text" name="ubahSertifikasi" id="sertifikasi" class="form-control w-full">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" data-modal-toggle="updateBiodata" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
