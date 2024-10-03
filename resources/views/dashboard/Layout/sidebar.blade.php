<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @php
            $jenis_user_id = auth()->user()->jenis_user_id;

            $menus = App\Models\Menu::whereHas('settingMenus', function ($query) use ($jenis_user_id) {
                $query->where('jenis_user_id', $jenis_user_id);
            })->get();
        @endphp

        @foreach ($menus as $menu)
            <li class="nav-item {{ request()->is('dashboard/' . $menu->link_menu . '*') ? 'active' : '' }}"
                style="margin-bottom: 10px;">
                <a class="nav-link" href="/dashboard/{{ $menu->link_menu }}"
                    style="padding: 12px 15px; border-radius: 5px; display: flex; align-items: center;">
                    <i class="{{ $menu->icon_menu ?? 'icon-layout menu-icon' }}" style="margin-right: 10px;"></i>
                    <span class="menu-title">
                        {{ $menu->nama_menu }}
                        @if ($menu->link_menu == 'messages' && isset($totalUnreadMessages) && $totalUnreadMessages > 0)
                            <span class="badge badge-danger"
                                style="margin-left: 10px; font-size: 12px; padding: 4px 6px; border-radius: 10px;">
                                {{ $totalUnreadMessages }}
                            </span>
                        @endif
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
