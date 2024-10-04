<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\User;
use App\Models\SettingMenu;
use App\Models\JenisUser;
use App\Models\Postingan; // Import the Postingan model

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hitung jumlah data untuk dashboard
        $totalUnreadMessages = MessageTo::where('receiver', $user->email)->count();
        $totalSentMessages = Message::where('sender', $user->email)->count();
        $totalReceivedMessages = MessageTo::where('receiver', $user->email)->count();
        $totalBooks = Buku::count();
        $totalCategories = KategoriBuku::count();
        $totalUsers = User::count();
        $totalMenus = Menu::count();
        $totalSettingMenus = SettingMenu::count();
        $totalJenisUsers = JenisUser::count();
        $totalPostingan = Postingan::count(); // Adding Postingan statistics

        // Data Menu
        $menus = Menu::whereHas('settingMenus', function ($query) use ($user) {
            $query->where('jenis_user_id', $user->jenis_user_id);
        })->get();

        return view('dashboard.index', compact(
            'user',
            'menus',
            'totalSentMessages',
            'totalReceivedMessages',
            'totalBooks',
            'totalCategories',
            'totalUsers',
            'totalMenus',
            'totalSettingMenus',
            'totalJenisUsers',
            'totalUnreadMessages',
            'totalPostingan' // Pass totalPostingan to the view
        ));
    }
}
