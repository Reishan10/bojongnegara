<div class="widget settings-menu">
    <ul>
        <li class="nav-item">
            <a href="{{ route('pengaturan.profile') }}"
                class="nav-link{{ request()->routeIs('pengaturan.profile') ? ' active' : '' }}">
                <i class="far fa-user"></i> <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pengaturan.gantiPassword') }}"
                class="nav-link{{ request()->routeIs('pengaturan.gantiPassword') ? ' active' : '' }}">
                <i class="fas fa-unlock-alt"></i> <span>Ganti Password</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pengaturan.nonaktif') }}"
                class="nav-link{{ request()->routeIs('pengaturan.nonaktif') ? ' active' : '' }}">
                <i class="fas fa-ban"></i> <span>Nonaktifkan Akun</span>
            </a>
        </li>
    </ul>

</div>
