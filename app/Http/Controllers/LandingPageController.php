<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageModel;
use App\Models\BrandModel;
use App\Models\FaqModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $konten = LandingPageModel::first();
        $blog   = DB::table('blog')
                ->select(DB::raw('MONTH(tanggal) as bulan, DAY(tanggal) as tanggal, judul, konten, image, slug'))
                ->where('status', 'publish')
                ->limit(3)->get();
        
        
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
            'deskripsiKeunggulan' => $deskripsiKeunggulan,
            'blog' => $blog,
            'faq' => FaqModel::all()
        ];
        return view('landing_page/home', $data);
    }
}
