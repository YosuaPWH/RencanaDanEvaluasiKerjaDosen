{{-- <button type="button" data-modal-toggle="editData" class="py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded">
    Edit
</button>

<script>
    $(document).ready(function() {
        $("#pel").select2({dropdownCssClass : 'bigdrop'});
        // $("#status").select2({dropdownCssClass : 'bidrop'});
    });
</script> --}}
@extends('home')

<div id="editData" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="m-auto shadow-lg  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white">
        
        {{-- Modal Content --}}
        <div class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
            {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Edit Data</h3>
                <button type="button" data-modal-toggle="editData">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form action="/rencana-kerja/dawwaw/tambah-data" method="POST">
                @csrf
                <div>
                    <div class="mb-4">
                        <select name="pelaksanaan" id="pel" style="width: 100%">
                            <option selected disabled > da</option>
                            {{-- @foreach ($editData as $dt)
                                <option value="{{ $dt}}" name="">{{ $dt }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="editKegiatan">Nama Kegiatan</label>
                        <input type="text" name="namaKegiatan" id="editKegiatan" class="form-control" value="{{ $tampilData->nama_kegiatan }}" disabled>
                    </div>
                    <div class="flex justify-between gap-3">
                        <div>
                            <label for="status">Status</label><br>
                            {{-- <input type="text" name="status" id="tambahStatus" class="form-control"> --}}
                            <select name="status" id="status" class="form-select">
                                <option value="Berlanjut">Berlanjut</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div>
                            <label for="bebanTugas">Beban Tugas</label>
                            <input type="text" name="bebanTugas" id="tambahBebanTugas" class="form-control" value="{{ $tampilData->beban_tugas }}">
                        </div>
                        <div>
                            <label for="jlhKegiatan">Jumlah Kegiatan</label>
                            <input type="text" name="jumlahKegiatan" id="tambahJlhKegiatan" class="form-control" value="{{ $tampilData->jumlah_kegiatan }}">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" data-modal-toggle="editData" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>