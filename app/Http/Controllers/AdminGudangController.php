<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\User;
use App\Models\BrandModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;

class AdminGudangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('gudang/admin', $data);
    }

    public function pesanan()
    {
        $user = User::all();
        $brand = BrandModel::all();
        $produk = ProdukModel::all();

        $pesanan = DB::table('pesanan')
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
            ->orderBy('created_at', 'DESC')
            ->get();

        $data = [
            'title' => 'Pesanan',
            'pesanan' => $pesanan,
            'users' => $user,
            'produk' => $produk,
            'brand' => $brand
        ];

        return view('gudang/pesanan', $data);
    }

    public function reseller()
    {
        $reseller = User::where(['role' => 'reseller'])->get();

        $data = [
            'title' => 'Data Reseller',
            'reseller' => $reseller
        ];

        return view('gudang/reseller', $data);
    }

    public function deleteReseller(Request $request)
    {
        if(User::where('id',$request->id)->delete()){
            return redirect()->back()->with('success', 'DATA RESELLER BERHASIL DIHAPUS');
        }
        return redirect()->back()->with('failed', 'DATA RESELLER GAGAL DIHAPUS');
    }

    public function insertReseller(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => $request->password
        ];


        if(User::create($data)){
            return redirect()->back()->with('success', 'BERHASIL MENAMBAHKAN DATA RESELLER');
        }
        return redirect()->back()->with('failed', 'GAGAL MENAMBAHKAN DATA RESELLER');
    }
    
    public function updateReseller(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ];


        if(User::where('id',$request->id)->update($data)){
            return redirect()->back()->with('success', 'BERHASIL UPDATE DATA RESELLER');
        }
        return redirect()->back()->with('failed', 'GAGAL UPDATE DATA RESELLER');
    }

    public function profil($id = null)
    {
        $user = User::find($id);
        
        $data = [
            'title' => 'Profil',
            'user' => $user
        ];
        return view('profil/gudang', $data);
    }
}
