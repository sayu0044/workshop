<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SettingMenu;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Get the menu_id from the current route
        $menuId = $this->getMenuIdFromRoute($request);

        if ($menuId) {
            // Check if the user has access to the menu based on menu_id
            $hasAccess = SettingMenu::where('jenis_user_id', $user->jenis_user_id)
                ->where('menu_id', $menuId)
                ->exists();

            // If access is denied, redirect or abort
            if (!$hasAccess) {
                return redirect()->route('dashboard')->with('error', 'You do not have access to this menu.');
            }
        }

        return $next($request);
    }

    private function getMenuIdFromRoute(Request $request)
    {
        // Define your route to menu_id mapping
        $routeMenuMapping = [
            'menu.index' => 1,
            'setting_menus.index' => 2,
            'kategori_buku.index' => 3,
            'buku.index' => 4,
            'users.index' => 5,
            'jenis_user.index' => 6,
        ];

        $routeName = $request->route()->getName();

        return $routeMenuMapping[$routeName] ?? null;
    }

  
}
