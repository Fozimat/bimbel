<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('siswa') ? 'active': '' }}">
            <a href="{{ route('siswa-dashboard') }}">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ request()->is('siswa/materisiswa*') ? 'active': '' }}">
            <a href="{{ route('materisiswa.index') }}">
                <i class="material-icons">people</i>
                <span>Daftar Materi</span>
            </a>
        </li>
        <li>
            <a href="{{ route('mapel.index') }}">
                <i class="material-icons">text_fields</i>
                <span>Daftar Tugas</span>
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