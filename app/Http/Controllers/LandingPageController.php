<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageModel;
use App\Models\BrandModel;
use App\Models\ProdukModel;

class LandingPageController extends Controller
{
    public function index()
    {
        $konten = LandingPageModel::first();

        $benefit = explode('-',$konten->poin_benefit);
        $deskripsiBenefit = explode('-', $konten->deskripsi_poin_benefit);
        $keunggulan = explode('-', $konten->poin_keunggulan);
        $deskripsiKeunggulan = explode('-', $konten->deskripsi_poin_keunggulan);
        $data = [
            'konten' => $konten,
            'brand' => BrandModel::all(),
            'produk' => ProdukModel::all(),
            'benefit' => $benefit,
            'deskripsiBenefit' => $deskripsiBenefit,
            'keunggulan' => $keunggulan,
            'deskripsiKeunggulan' => $deskripsiKeunggulan
        ];
        return view('landing_page/home', $data);
    }
}
