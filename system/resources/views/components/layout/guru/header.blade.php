<header class="app-header" style="border-bottom: 1px solid #ddd;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown d-flex align-items-center">
                    <!-- Nama User -->
                    <span class="me-2 fw-semibold">
                        {{ Auth::user()->username }}
                    </span>

                    <!-- Foto Profil -->
                    <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown">
                        <img src="{{ url('public/app/foto-guru/' . Auth::user()->foto_profil) }}" width="50" height="50"
                            class="rounded-circle" alt="Foto Profil">
                    </a>

                    <!-- Dropdown -->
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ url('settings') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Settings</a>
                        </div>
                        <div class="message-body">
                            <a href="{{ url('logout') }}" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
