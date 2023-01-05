<p hidden>{{ $currentPage = $_SERVER['PHP_SELF']; }}</p>
<nav class="flex p-0 w-fit rounded-lg mb-3">
    <a href="/rencana-kerja/biodata"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-l-lg font-bold {{ ($currentPage == '/index.php/rencana-kerja/biodata') ? 'active':'' }}">Biodata</a>
    <a href="/rencana-kerja/pendidikan"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/rencana-kerja/pendidikan') ? 'active':'' }}">Pelaksanaan
        Pendidikan</a>
    <a href="/rencana-kerja/penelitian"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/rencana-kerja/penelitian') ? 'active':'' }}">Pelaksanaan
        Penelitian</a>
    <a href="/rencana-kerja/pengabdian"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/rencana-kerja/pengabdian') ? 'active':'' }}">Pelaksanaan
        Pengabdian</a>
    <a href="/rencana-kerja/penunjang"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/rencana-kerja/penunjang') ? 'active':'' }}">Pelaksanaan
        Penunjang</a>
    <a href="/simpulan"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-r-lg font-bold {{ ($currentPage == '/index.php/simpulan') ? 'active':'' }}">Simpulan</a>
</nav>