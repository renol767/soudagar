<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use App\Models\User;
use App\Models\BrandModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

    public function produk(){
        $produk = ProdukModel::all();
        $brand = BrandModel::all();
        $data = [
            'title' => 'Produk',
            'produk' => $produk,
            'brand' => $brand
        ];
        return view('gudang/produk', $data); 
    }

    public function insertProduk(Request $request)
    {
        if ($request->hasFile('foto_produk')) {
            $imageName = time() . '.' . $request->file('foto_produk')->extension();
            $request->file('foto_produk')->move('images/produk', $imageName);
        } else {
            return redirect('/website/masterbrand');
        }
        $data = array(
            'id_brand' => $request->input('id_brand'),
            'nama_produk' => $request->input('nama_produk'),
            'foto_produk' => $imageName,
            'deskripsi_produk' => $request->input('deskripsi_produk'),
            'stok_produk' => $request->input('stok_produk'),
            'harga_reseller' => $request->input('harga_reseller'),
            'harga_jual' => $request->input('harga_jual'),
        );
        if(DB::Table('produk')->insert($data)){
            return redirect()->back()->with('success', 'BERHASIL MENAMBAHKAN DATA PRODUK');
        }
        return redirect()->back()->with('failed', 'GAGAL MENAMBAHKAN DATA PRODUK');
    }

    public function updateProduk(Request $request){
        if ($request->hasFile('newfoto_produk')) {
            $check = DB::Table('produk')->where('id', '=', $request->input('editid'))->count();
            if ($check > 0) {
                $imgName = DB::Table('produk')->select('foto_produk')->where('id', $request->input('editid'))->get();
                $imgName = 'images/produk/' . $imgName[0]->foto_produk;
                File::delete($imgName);
                $imageName = time() . '.' . $request->file('newfoto_produk')->extension();
                $request->file('newfoto_produk')->move('images/produk', $imageName);
                $updatedata = array(
                    'id_brand' => $request->input('editid_brand'),
                    'nama_produk' => $request->input('editnama_produk'),
                    'foto_produk' => $imageName,
                    'deskripsi_produk' => $request->input('editdeskripsi_produk'),
                    'stok_produk' => $request->input('editstok_produk'),
                    'harga_reseller' => $request->input('editharga_reseller'),
                    'harga_jual' => $request->input('editharga_jual'),
                );
                if(DB::Table('produk')->where('id', '=', $request->input('editid'))->update($updatedata)){
                    return redirect()->back()->with('success', 'BERHASIL MENGUPDATE DATA PRODUK');
                }
                return redirect()->back()->with('failed', 'GAGAL MENGUPDATE DATA PRODUK');
            } else {
                return redirect()->back()->with('failed', 'GAGAL MENGUPDATE DATA PRODUK');
            }
        } else {
            $check = DB::Table('produk')->where('id', '=', $request->input('editid'))->count();
            $updatedata = array(
                'id_brand' => $request->input('editid_brand'),
                'nama_produk' => $request->input('editnama_produk'),
                'deskripsi_produk' => $request->input('editdeskripsi_produk'),
                'stok_produk' => $request->input('editstok_produk'),
                'harga_reseller' => $request->input('editharga_reseller'),
                'harga_jual' => $request->input('editharga_jual'),
            );
            if ($check > 0) {
                if(DB::Table('produk')->where('id', '=', $request->input('editid'))->update($updatedata)){
                    return redirect()->back()->with('success', 'BERHASIL MENGUPDATE DATA PRODUK');
                }
                return redirect()->back()->with('failed', 'GAGAL MENGUPDATE DATA PRODUK');
            } else {
                return redirect()->back()->with('failed', 'GAGAL MENGUPDATE DATA PRODUK');
            }
        }
    }

    public function deleteProduk(Request $request){
        $check = DB::Table('produk')->where('id', '=', $request->input('deleteprodukid'))->count();
        if ($check > 0) {
            $imgName = DB::Table('produk')->select('foto_produk')->where('id', $request->input('deleteprodukid'))->get();
            $imgName = 'images/produk/' . $imgName[0]->foto_produk;
            if(!File::delete($imgName)){
                return redirect()->back()->with('failed', 'GAGAL MENGHAPUS DATA PRODUK');
            }
            if(DB::Table('produk')->where('id', '=', $request->input('deleteprodukid'))->delete()){
                return redirect()->back()->with('success', 'BERHASIL MENGHAPUS DATA PRODUK');
            }
            return redirect()->back()->with('failed', 'GAGAL MENGHAPUS DATA PRODUK');
        } else {
            return redirect()->back()->with('failed', 'GAGAL MENGHAPUS DATA PRODUK');
        }
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
