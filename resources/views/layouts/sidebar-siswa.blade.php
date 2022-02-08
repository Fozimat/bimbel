<div class="menu">
    <ul class="list">
        <li class="header">MASTER DATA</li>
        <li class="{{ request()->is('siswa') ? 'active': '' }}">
            <a href="{{ route('siswa-dashboard') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ request()->is('siswa/materisiswa*') ? 'active': '' }}">
            <a href="{{ route('materisiswa.index') }}">
                <i class="material-icons">description</i>
                <span>Daftar Materi</span>
            </a>
        </li>
        <li class="{{ request()->is('siswa/tugassiswa*') ? 'active': '' }}">
            <a href="{{ route('tugassiswa.index') }}">
                <i class="material-icons">assignment</i>
                <span>Daftar Tugas</span>
            </a>
        </li>
    </ul>
</div>