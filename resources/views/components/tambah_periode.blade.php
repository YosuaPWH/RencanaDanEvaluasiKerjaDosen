<button type="button" onclick="openModals(true)" class="p-2 text-white rounded bg-green-500 font-medium hover:bg-green-600 mb-3">
    <i class="bi bi-plus-lg"></i>
    Tambah Periode
</button>

{{-- <script>
    $(document).ready(function() {
        $("#pel").select2({dropdownCssClass : 'bigdrop'});
    });
</script> --}}


<div id="modal_overlay_tambah" class="hidden inset-0 bg-gray-900 bg-opacity-50  overflow-y-auto overflow-x-hidden fixed w-full top-0 right-0 left-0 z-50 flex justify-center md:inset-0 md:h-full items-start md:items-center pt-10 md:pt-0">

    <div id="modal_tambah" class=" transform -translate-y-full  scale-150  relative w-full max-w-2xl rounded-lg h-full md:h-auto bg-white  duration-300">
            
        {{-- Modal Content --}}
        <div  class="relative p-4 bg-whitety rounded-lg shadow sm:p-5">
                {{-- Modal Header --}}
            <div class="header flex justify-between border-b mb-3">
                <h3>Tambah Periode</h3>
                <button type="button" onclick="openModals(false)">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            {{-- Modal Body --}}
            <form action="tambah-periode" method="POST">
                @csrf
                <div class="flex gap-3">
                    <div class="w-full">
                        <label for="tahun">Tahun</label>
                        <input type="text" name="tahun" id="tahun" placeholder="Format: 2021/2022, 2022/2023, . . ." class="form-control">
                    </div>
                    <div class="w-full">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-select">
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded font-semibold">Simpan</button>
                    <button type="button" onclick="openModals(false)" class="hover:bg-red-600 text-red-600 font-semibold hover:text-white py-2 px-4 outline-1 outline border-red-600 rounded">Batal</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



<script>
    
    function openModals (value){
        const modal_overlay = document.querySelector('#modal_overlay_tambah');
        const modal = document.querySelector('#modal_tambah');
        const modalCl = modal.classList
        const overlayCl = modal_overlay
        
        if(value){
            overlayCl.classList.remove('hidden')
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
        } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }
</script>

