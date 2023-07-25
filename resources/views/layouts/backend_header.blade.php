<div class="header header-one">
    <div class="header-left header-left-one">
        <a href="index.html" class="logo">
            <img src="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}" alt="Logo">
        </a>
        <a href="index.html" class="white-logo">
            <img src="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('assets/img/logo/LOGO-KABUPATEN-CIREBON.png') }}" alt="Logo" width="30"
                height="30">
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <ul class="nav nav-tabs user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span>{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html"><i data-feather="user" class="me-1"></i>
                    Profile</a>
                <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="me-1"></i>
                    Settings</a>
                {{-- <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="me-1"></i>
                    Logout</a> --}}

                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                    <span>Keluar</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
