<?php

namespace App\Http\Controllers;

use App\Models\SettingMenu;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    public function index()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        $settingMenus = SettingMenu::with('menu', 'jenisUser')->get(); // Memuat relasi untuk jenisUser dan menu
        return view('dashboard.setting_menus.index', compact('jenisUsers', 'menus', 'settingMenus')); // Menggunakan settingMenus
    }
    public function create()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();

        $settingMenus = SettingMenu::all()->groupBy('jenis_user_id');

        return view('dashboard.setting_menus.create', compact('jenisUsers', 'menus', 'settingMenus'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_user_id' => 'required',
            'menu_id' => 'required|array',
        ]);

        // Loop through the menu IDs from the validated data
        foreach ($validated['menu_id'] as $menuId) {
            // Check if the setting already exists for the given jenis_user_id and menu_id
            $existingSetting = SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
                ->where('menu_id', $menuId)
                ->first();

            // If it doesn't exist, create a new setting
            if (!$existingSetting) {
                SettingMenu::create([
                    'jenis_user_id' => $validated['jenis_user_id'],
                    'menu_id' => $menuId,
                ]);
            }
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $settingMenu = SettingMenu::where('jenis_user_id', $id)->get(); // Mengambil semua menu untuk jenis user tertentu
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();

        $selectedMenus = $settingMenu->pluck('menu_id')->toArray(); // Mengambil hanya menu_id sebagai array

        return view('dashboard.setting_menus.edit', compact('settingMenu', 'jenisUsers', 'menus', 'selectedMenus'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_user_id' => 'required',
            'menu_id' => 'required|array',
        ]);

        SettingMenu::where('jenis_user_id', $id)->delete(); // Hapus semua setting menu lama

        foreach ($validated['menu_id'] as $menuId) {
            SettingMenu::create([
                'jenis_user_id' => $validated['jenis_user_id'],
                'menu_id' => $menuId,
            ]);
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil diupdate');
    }

    public function destroy($id)
    {
        SettingMenu::where('jenis_user_id', $id)->delete();
        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil dihapus');
    }
}
