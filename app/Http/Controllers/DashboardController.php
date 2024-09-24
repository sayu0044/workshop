<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $menus = Menu::whereHas('settingMenus', function ($query) use ($user) {
            $query->where('jenis_user_id', $user->jenis_user_id);
        })->get();

        return view('dashboard.index', compact('user', 'menus'));
    }
}
