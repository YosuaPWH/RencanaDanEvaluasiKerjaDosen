<div id="modal_overlay_delete" class="hidden inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed w-full top-0 right-0 left-0 z-50 flex justify-center md:inset-0 md:h-full items-start md:items-center md:pt-0">

    <div id="modal_delete" class=" transform -translate-y-full scale-100 relative w-auto max-w-xl rounded-lg h-full md:h-auto bg-white  duration-300">
            
        {{-- Modal Content --}}
        <div class="relative bg-whitety rounded-lg shadow sm:p-5">
            {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Konfirmasi Hapus</h3>
                <button type="button" onclick="hapus(false)">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form id="delete-form" action="hapus-periode" method="POST">
                @csrf
                @method('DELETE')
                <input type="text" id="delete-id" name="delete_id" hidden>
                <p class="text-bold text-base">Apakah anda yakin ingin menghapus periode ini? Periode yang sudah dihapus tidak dapat dikembalikan lagi.</p>
                <div class="text-end mt-7">
                    <button class="text-white p-2.5 bg-gray-500 hover:bg-gray-600 rounded" onclick="hapus(false)" type="button">Batal</button>
                    <button class="text-white bg-red-500 p-2.5 rounded hover:bg-red-600" type="submit">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    const modal_overlay_delete = document.querySelector('#modal_overlay_delete');
    const modal_delete = document.querySelector('#modal_delete');
    
    function hapus (value){
        
        if(value){
            modal_overlay_delete.classList.remove('hidden');
            setTimeout(() => {
                modal_delete.classList.remove('opacity-0')
                modal_delete.classList.remove('-translate-y-full')
                modal_delete.classList.remove('scale-150')
            }, 100);

        } else {
            modal_delete.classList.add('-translate-y-full')
            setTimeout(() => {
                modal_delete.classList.add('opacity-0')
                modal_delete.classList.add('scale-150')
            }, 100);
            setTimeout(() => modal_overlay_delete.classList.add('hidden'), 300);
        }
    }
</script>

<script>
    $(document).ready(function($) {
        $('.btn-hapus').on('click', function() {
            var idData = $(this).data('id');
            $("#delete-id").val(idData);
        })
    })
</script>