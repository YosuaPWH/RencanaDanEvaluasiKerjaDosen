<div id="modal_overlay" class="hidden inset-0 bg-gray-900 bg-opacity-50  overflow-y-auto overflow-x-hidden fixed w-full top-0 right-0 left-0 z-50 flex justify-center md:inset-0 md:h-full items-start md:items-center pt-10 md:pt-0">

    <div id="modal" class=" transform -translate-y-full  scale-150  relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white  duration-300">
            
        {{-- Modal Content --}}
        <div  class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
                {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Edit Data</h3>
                <button type="button" onclick="coba(false)">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form id="edit-form" action="{{ $pelaksanaan }}/edit-data" method="POST">
                @csrf
                <input type="text" name="editId" id="modal-id" hidden>
                <div>
                    <div class="mb-4">
                        <input type="text" name="modal-input-pelaksanaan" id="modal-input-nama-tabel" class="form-control" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" name="editNamaKegiatan"  id="modal-input-nama-kegiatan" class="form-control">
                    </div>
                    <div class="flex justify-between gap-3">
                        <div>
                            <label for="status">Status</label><br>
                            <select name="editStatus" id="modal-input-status" class="form-select">
                                <option value="Berlanjut">Berlanjut</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div>
                            <label for="bebanTugas">Beban Tugas</label>
                            <input type="text" name="editBebanTugas" id="modal-input-beban-tugas" class="form-control">
                        </div>
                        <div>
                            <label for="jlhKegiatan">Jumlah Kegiatan</label>
                            <input type="text" name="editJumlahKegiatan" id="modal-input-jumlah-kegiatan" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" onclick="coba(false)" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="url" class="hidden">
    {{ $url }}
</div>

<script>
    $(document).ready(function($) {
        $('.btn-edit').on('click', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).data('id');
            var namaTabel = $(this).data('nama-tabel');
            let getUrl = $("#url").text();
            
            $.ajax({
                type: "POST",
                url: getUrl,
                data: { id: id },
                dataType: 'json',
                success: function(res) { 
                    $("#modal-id").val(res.id);
                    // console.log(res.id)
                    $("#modal-input-nama-tabel").val(namaTabel);
                    $("#modal-input-nama-kegiatan").val(res.nama_kegiatan);
                    $("#modal-input-status").val(res.status);
                    $("#modal-input-beban-tugas").val(parseInt(res.beban_tugas));
                    $("#modal-input-jumlah-kegiatan").val(res.jumlah_kegiatan);
                }
            });
        });
    })
</script>



<script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');
    
    function coba (value){
        
        if(value){
            modal_overlay.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0')
                modal.classList.remove('-translate-y-full')
                modal.classList.remove('scale-150')
            }, 100);

        } else {
            modal.classList.add('-translate-y-full')
            setTimeout(() => {
                modal.classList.add('opacity-0')
                modal.classList.add('scale-150')
            }, 100);
            setTimeout(() => modal_overlay.classList.add('hidden'), 300);

            $("#modal-input-nama-tabel").val("");
            $("#modal-input-nama-kegiatan").val("");
            $("#modal-input-status").val("");
            $("#modal-input-beban-tugas").val("");
            $("#modal-input-jumlah-kegiatan").val("");
        }
    }
</script>