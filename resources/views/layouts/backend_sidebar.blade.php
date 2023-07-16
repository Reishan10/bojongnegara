<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main</span></li>
                <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-house"></i> <span>Dashboard</span></a>
                </li>
                <li
                    class="submenu {{ request()->is('berita*') ? 'active' : '' }} {{ request()->is('kategori') ? 'active' : '' }}  {{ request()->is('tag') ? 'active' : '' }}">
                    <a href="#"><i class="fa-solid fa-newspaper"></i> <span> Post</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="{{ route('berita.create') }}"
                                class="subdrop {{ request()->is('berita/tambah') ? 'active' : '' }}">
                                Tambah Berita
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('berita.index') }}"
                                class="subdrop {{ request()->path() !== 'berita/tambah' && request()->is('berita*') ? 'active' : '' }}">Berita</a>
                        </li>


                        <li>
                            <a href="{{ route('kategori.index') }}"
                                class="subdrop  {{ request()->is('kategori') ? 'active' : '' }}">Kategori</a>
                        </li>
                        <li>
                            <a href="{{ route('tag.index') }}"
                                class="subdrop  {{ request()->is('tag') ? 'active' : '' }}">Tag</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href=""><i class="fa-solid fa-comment"></i> <span>Komen</span></a>
                </li>
                <li>
                    <a href=""><i class="fa-solid fa-envelope"></i> <span>Pesan</span></a>
                </li>
                <li class="{{ request()->is('layanan*') ? 'active' : '' }}">
                    <a href="{{ route('layanan.index') }}"><i class="fa-solid fa-thumbs-up"></i>
                        <span>Layanan</span></a>
                </li>
                <li class="{{ request()->is('pengguna*') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}"><i class="fa-solid fa-users"></i> <span>Pengguna</span></a>
                </li>
                <li class="{{ request()->is('pengaturan*') ? 'active' : '' }}">
                    <a href="{{ route('pengaturan.profile') }}"><i data-feather="settings"></i>
                        <span>Pengaturan</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="side-nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
