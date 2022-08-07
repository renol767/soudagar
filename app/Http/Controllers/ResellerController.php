<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\User;
use App\Models\ProdukModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;

class ResellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('reseller/dashboard', $data);
    }

    public function pengajuanProduk()
    {
        $user = User::all();
        $brand = BrandModel::all();
        $produk = ProdukModel::all();

        $pengajuan = DB::table('pesanan')
            ->join('brand', 'pesanan.id_brand', '=', 'brand.id')
            ->join('produk', 'pesanan.id_produk', '=', 'produk.id')
            ->join('users', 'pesanan.id_user', '=', 'users.id')
            ->select(
                'users.name',
                'users.email',
                'brand.*',
                'produk.*',
                'pesanan.*'
            )
            ->where(['users.id'=>auth()->user()->id])
            ->orderBy('created_at', 'DESC')
            ->get();
        $data = [
            'title' => 'Pengajuan Produk',
            'pengajuan' => $pengajuan,
            'produk' => $produk,
            'brand' => $brand
        ];

        return view('reseller/pengajuanProduk', $data);
    }

    public function profil($id = null)
    {
        $user = User::find($id);
        
        $data = [
            'title' => 'Profil',
            'user' => $user
        ];
        return view('profil/reseller', $data);
    }
}
