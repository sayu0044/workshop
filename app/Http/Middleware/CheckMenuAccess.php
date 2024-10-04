<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SettingMenu;

class CheckMenuAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        $menuId = $this->getMenuIdFromRoute($request);

        if ($menuId) {
            $hasAccess = SettingMenu::where('jenis_user_id', $user->jenis_user_id)
                ->where('menu_id', $menuId)
                ->exists();

            if (!$hasAccess) {
                return redirect()->route('dashboard')->with('error', 'You do not have access to this menu.');
            }
        }

        return $next($request);
    }

    private function getMenuIdFromRoute(Request $request)
    {
        $routeMenuMapping = [
            'menu.index' => 1,
            'setting_menus.index' => 2,
            'kategori_buku.index' => 3,
            'buku.index' => 4,
            'users.index' => 5,
            'jenis_user.index' => 6,
            'inbox' => 7,
            'sent' => 8,
            'postingan.index' => 9,  // Akses ke Postingan
            'gempa' => 10,  // Akses ke Informasi Gempa
            'map' => 11,  // Akses ke Informasi Map
        ];

        $routeName = $request->route()->getName();

        return $routeMenuMapping[$routeName] ?? null;
    }
}
