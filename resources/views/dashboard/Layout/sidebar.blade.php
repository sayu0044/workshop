<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @php
            $jenis_user_id = auth()->user()->jenis_user_id;

            $menus = App\Models\Menu::whereHas('settingMenus', function ($query) use ($jenis_user_id) {
                $query->where('jenis_user_id', $jenis_user_id);
            })->get();
        @endphp

        @foreach ($menus as $menu)
            <li class="nav-item {{ request()->is(ltrim($menu->link_menu, '/') . '*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url($menu->link_menu) }}">
                    <i class="{{ $menu->icon_menu ?? 'icon-layout menu-icon' }}"></i>
                    <span class="menu-title">{{ $menu->nama_menu }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
