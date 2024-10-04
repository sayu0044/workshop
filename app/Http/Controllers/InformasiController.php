<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InformasiController extends Controller
{
    public function indexGempa()
    {
        $response = Http::get('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json');
        $dataGempa = $response->json();

        return view('dashboard.informasi.gempa', ['dataGempa' => $dataGempa]);
    }
public function indexMap()
{
    $geoapifyApiKey = 'b2bdd070d6974161897dd9d70cebe142'; // Masukkan API key Geoapify Anda

    return view('dashboard.informasi.map', compact('geoapifyApiKey'));
}

}
