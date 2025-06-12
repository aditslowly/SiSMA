    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{ url('admin') }}" class="text-nowrap logo-img">
                    <img src="{{ url('public/Template') }}/assets/images/logos/2.png" width="200" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin')) active @endif "
                            href="{{ url('admin') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">MASTER DATA</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin/tahun-ajar*')) active @endif"
                            href="{{ url('admin/tahun-ajar') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Tahun Ajar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin/guru*')) active @endif"
                            href="{{ url('admin/guru') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Guru</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin/siswa*')) active @endif"
                            href="{{ url('admin/siswa') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin/mata-pelajaran*')) active @endif"
                            href="{{ url('admin/mata-pelajaran') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-book"></i>
                            </span>
                            <span class="hide-menu">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link @if (request()->is('admin/kelas*')) active @endif"
                            href="{{ url('admin/kelas') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-home"></i>
                            </span>
                            <span class="hide-menu">Kelas</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
