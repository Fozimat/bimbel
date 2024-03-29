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
                <i class="material-icons">library_books</i>
                <span>Data Mapel</span>
            </a>
        </li>
        <li class="{{ request()->is('admin/tingkat*') ? 'active': '' }}">
            <a href="{{ route('tingkat.index') }}">
                <i class="material-icons">school</i>
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
                <i class="material-icons">assignment_returned</i>
                <span>Data Jawaban</span>
            </a>
        </li>
    </ul>
</div>