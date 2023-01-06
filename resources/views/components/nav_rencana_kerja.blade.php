<p hidden>{{ $currentPage = $_SERVER['PHP_SELF']; }}</p>
<nav class="flex p-0 w-fit rounded-lg mb-3">
    <a href="biodata"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-l-lg font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/biodata') ? 'active':'' }}">Biodata</a>
    <a href="pendidikan"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/pendidikan') ? 'active':'' }}">Pelaksanaan
        Pendidikan</a>
    <a href="penelitian"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/penelitian') ? 'active':'' }}">Pelaksanaan
        Penelitian</a>
    <a href="pengabdian"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/pengabdian') ? 'active':'' }}">Pelaksanaan
        Pengabdian</a>
    <a href="penunjang"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/penunjang') ? 'active':'' }}">Pelaksanaan
        Penunjang</a>
    <a href="simpulan"
        class="bg-whitety p-3 hover:bg-bluedesign hover:text-white rounded-r-lg font-bold {{ ($currentPage == '/index.php/'.Auth::user()->periode.'/rencana-kerja/simpulan') ? 'active':'' }}">Simpulan</a>
</nav>