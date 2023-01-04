<div id="modal_overlay_pend_A" class="hidden inset-0 bg-gray-900 bg-opacity-50  overflow-y-auto overflow-x-hidden fixed w-full top-0 right-0 left-0 z-50 flex justify-center md:inset-0 md:h-full items-start md:items-center pt-10 md:pt-0">

    <div id="modal_A" class=" transform -translate-y-full  scale-150  relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white  duration-300">
            
        {{-- Modal Content --}}
        <div  class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
                {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Edit Data</h3>
                <button type="button" onclick="editA(false)">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form id="edit-form" action="{{ $pelaksanaan }}/edit-data" method="POST">
                @csrf
                <input type="text" name="editId" id="modal-idA" hidden>
                <div>
                    <div class="mb-4">
                        <input type="text" name="modal_input_pelaksanaan" id="modal-input-nama-tabelA" class="form-control" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="namaKegiatan">Nama Kegiatan</label>
                        <input type="text" name="editNamaKegiatan"  id="modal-input-nama-kegiatanA" class="form-control">
                    </div>
                    <div class="flex justify-between gap-3 mb-2">
                        <div class="w-3/4">
                            <label for="rencana">Rencana Pertemuan</label><br>
                            <input type="text" name="rencanaPertemuan" id="modal-input-rencana-pertemuanA" class="form-control" placeholder="Jumlah pertemuan">
                        </div>
                        
                        <div class="w-1/4">
                            <label for="modal-input-statusA">Status</label><br>
                            <select name="editStatus" id="modal-input-statusA" class="form-select">
                                <option value="Berlanjut">Berlanjut</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-between gap-3">
                        <div class="w-1/2">
                            <label for="sksmkterhitung">SKS MK Terhitung</label>
                            <input type="text" name="editSksMkTerhitung" id="modal-input-sks-mk-terhitungA" class="form-control" placeholder="Contoh: 2.63">
                        </div>
                        <div class="w-1/2">
                            <label for="sksbkd">SKS BKD</label>
                            <input type="text" name="editSksBkd" id="modal-input-sks-bkdA" class="form-control" placeholder="Contoh: 2.625">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" onclick="editA(false)" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
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
        $('.btn-edit-A').on('click', function() {
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
                    $("#modal-idA").val(res.id);
                    console.log(res)
                    $("#modal-input-nama-tabelA").val(namaTabel);
                    $("#modal-input-nama-kegiatanA").val(res.nama_kegiatan);
                    $("#modal-input-statusA").val(res.status);
                    $("#modal-input-rencana-pertemuanA").val(res.rencana_pertemuan);
                    $("#modal-input-sks-mk-terhitungA").val(res.sks_mk_terhitung*1);
                    $("#modal-input-sks-bkdA").val(res.sks_bkd*1);
                }
            });
        });
    })
</script>



<script>
    const modal_overlay_pend_A = document.querySelector('#modal_overlay_pend_A');
    const modal_A = document.querySelector('#modal_A');
    
    function editA (value){
        
        if(value){
            modal_overlay_pend_A.classList.remove('hidden');
            setTimeout(() => {
                modal_A.classList.remove('opacity-0')
                modal_A.classList.remove('-translate-y-full')
                modal_A.classList.remove('scale-150')
            }, 100);

        } else {
            modal_A.classList.add('-translate-y-full')
            setTimeout(() => {
                modal_A.classList.add('opacity-0')
                modal_A.classList.add('scale-150')
            }, 100);
            setTimeout(() => modal_overlay_pend_A.classList.add('hidden'), 300);

            $("#modal-input-nama-tabel").val("");
            $("#modal-input-nama-kegiatan").val("");
            $("#modal-input-status").val("");
            $("#modal-input-beban-tugas").val("");
            $("#modal-input-jumlah-kegiatan").val("");
        }
    }
</script>