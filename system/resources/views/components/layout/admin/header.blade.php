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
                        <img src="{{ url('public/app/foto-admin/' . Auth::user()->foto_profil) }}" width="40" height="40"
                            class="rounded-circle" alt="Foto Profil">
                    </a>

                    <!-- Dropdown -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <li>
                            <a href="{{ url('admin/profil') }}" class="dropdown-item d-flex align-items-center">
                                <i class="ti ti-settings me-2"></i> Profil
                            </a>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center text-danger" onclick="confirmLogout()">
                                <i class="ti ti-logout me-2"></i> Keluar
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Logout Confirmation Script -->
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Kamu akan keluar dari akun ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('logout') }}";
            }
        });
    }
</script>

