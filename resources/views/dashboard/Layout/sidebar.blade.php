<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li
            class="nav-item {{ request()->is('dashboard/buku*') || request()->is('dashboard/kategori_buku*') || request()->is('dashboard/users*') || request()->is('dashboard/jenis_user*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic"
                aria-expanded="{{ request()->is('dashboard/buku*') || request()->is('dashboard/kategori_buku*') || request()->is('dashboard/users*') || request()->is('dashboard/jenis_user*') ? 'true' : 'false' }}"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ request()->is('dashboard/buku*') || request()->is('dashboard/kategori_buku*') || request()->is('dashboard/users*') || request()->is('dashboard/jenis_user*') ? 'show' : '' }}"
                id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard/kategori_buku*') ? 'active' : '' }}"
                            href="{{ route('kategori_buku.index') }}">Kategori</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard/buku*') ? 'active' : '' }}"
                            href="{{ route('buku.index') }}">Buku</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard/users*') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard/jenis_user*') ? 'active' : '' }}"
                            href="{{ route('jenis_user.index') }}">Manajemen Jenis User</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
