<div class="menu">
    <ul class="list">
        <li class="header">MASTER DATA</li>
        <li class="{{ request()->is('admin') ? 'active': '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ request()->is('admin/siswa*') ? 'active': '' }}">
            <a href="{{ route('siswa.index') }}">
                <i class="material-icons">people</i>
                <span>Data Siswa</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/mapel*') ? 'active': '' }}">
            <a href="{{ route('mapel.index') }}">
                <i class="material-icons">text_fields</i>
                <span>Data Mapel</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/tingkat*') ? 'active': '' }}">
            <a href="{{ route('tingkat.index') }}">
                <i class="material-icons">group</i>
                <span>Data Tingkat</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/materi*') ? 'active': '' }}">
            <a href="{{ route('materi.index') }}">
                <i class="material-icons">assignment</i>
                <span>Data Materi</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/tugas*') ? 'active': '' }}">
            <a href="{{ route('tugas.index') }}">
                <i class="material-icons">assignment_ind</i>
                <span>Data Tugas</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/jawaban*') ? 'active': '' }}">
            <a href="{{ route('jawaban.index') }}">
                <i class="material-icons">assignment_ind</i>
                <span>Data Jawaban</span>
            </a>
        </li>
        <li>
            <a href="pages/helper-classes.html">
                <i class="material-icons">library_books</i>
                <span>Data Jadwal</span>
            </a>
        </li>
        <li class="header">LABELS</li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-red">donut_large</i>
                <span>Important</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-amber">donut_large</i>
                <span>Warning</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-light-blue">donut_large</i>
                <span>Information</span>
            </a>
        </li>
    </ul>
</div>