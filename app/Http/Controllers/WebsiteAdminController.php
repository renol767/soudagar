<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

class WebsiteAdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkRole:website');
    }

    public function index()
    {
        return view('website/admin');
    }

    public function editkontenwebsite(){
        return view('website/menu/editkontenwebsite');
    }

    public function masteruser(){
        $users = DB::table('users')->get();
        return view('website/menu/masteruser', ['users' => $users]);
    }

    public function insertuser(Request $request){
        $newdata = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role')
        );
        DB::Table('users')->insert($newdata);
        return redirect('/website/masteruser');
    }

    public function edituser(Request $request){
        $check = DB::Table('users')->where('id', '=',$request->input('editid'))->count();
        $updatedata = array(
            'name' => $request->input('editname'),
            'email' => $request->input('editemail'),
            'role' => $request->input('editrole')
        );
        if ($check > 0){
            DB::Table('users')->where('id', '=',$request->input('editid'))->update($updatedata);
            return redirect('/website/masteruser');
        }else{
            return redirect('/website/masteruser');
        }
    }

    public function resetpwuser(Request $request){
        $check = DB::Table('users')->where('id', '=',$request->input('resetpwid'))->count();
        $resetpw = array(
            'password' => Hash::make($request->input('newpassword')),
        );
        if ($check > 0){
            DB::Table('users')->where('id', '=',$request->input('resetpwid'))->update($resetpw);
            return redirect('/website/masteruser');
        }else{
            return redirect('/website/masteruser');
        }
    } 

    public function deleteuser(Request $request){
        $check = DB::Table('users')->where('id', '=',$request->input('deleteuserid'))->count();
        if ($check > 0){
            DB::Table('users')->where('id', '=',$request->input('deleteuserid'))->delete();
            return redirect('/website/masteruser');
        }else{
            return redirect('/website/masteruser');
        }
    }

    public function masterbrand(){
        $data = DB::table('brand')->get();
        return view('website/menu/masterbrand', ['datas' => $data]);
    }

    public function insertbrand(Request $request){
        if($request->hasFile('logo_brand')){
            $imageName = time() . '.' . $request->file('logo_brand')->extension();
            $request->file('logo_brand')->move('images/brand', $imageName);
        }else{
            return redirect('/website/masterbrand');
        }
        $data = array(
            'nama_brand' => $request->input('nama_brand'),
            'logo_brand' => $imageName,
            'deskripsi_brand' => $request->input('deskripsi_brand'),
        );
        DB::Table('brand')->insert($data);
        return redirect('/website/masterbrand');
    }

    public function editbrand(Request $request){
        if($request->hasFile('newlogo_brand')){
            $check = DB::Table('brand')->where('id', '=',$request->input('editid'))->count();
            if ($check > 0){
                $imgName = DB::Table('brand')->select('logo_brand')->where('id', $request->input('editid'))->get();
                $imgName = 'images/brand/' . $imgName[0]->logo_brand;
                File::delete($imgName);
                $imageName = time() . '.' . $request->file('newlogo_brand')->extension();
                $request->file('newlogo_brand')->move('images/brand', $imageName);
                $updatedata = array(
                    'nama_brand' => $request->input('editnama_brand'),
                    'logo_brand' => $imageName,
                    'deskripsi_brand' => $request->input('editdeskripsi_brand'),
                );
                DB::Table('brand')->where('id', '=',$request->input('editid'))->update($updatedata);
                return redirect('/website/masterbrand');
            }else{
                return redirect('/website/masterbrand');
            }
        }else{
            $check = DB::Table('brand')->where('id', '=',$request->input('editid'))->count();
            $updatedata = array(
                'nama_brand' => $request->input('editnama_brand'),
                'deskripsi_brand' => $request->input('editdeskripsi_brand'),
            );
            if ($check > 0){
                DB::Table('brand')->where('id', '=',$request->input('editid'))->update($updatedata);
                return redirect('/website/masterbrand');
            }else{
                return redirect('/website/masterbrand');
            }
        }
    }

    public function deletebrand(Request $request){
        $check = DB::Table('brand')->where('id', '=',$request->input('deletebrandid'))->count();
        if ($check > 0){
            $imgName = DB::Table('produk')->select('id', 'foto_produk')->where('id_brand', $request->input('deletebrandid'))->get();
            foreach ($imgName as $fp){ 
                $imgName = 'images/produk/' . $fp->foto_produk;
                File::delete($imgName);
                DB::Table('produk')->where('id', '=',$fp->id)->delete();
            }
            $imgName = DB::Table('brand')->select('logo_brand')->where('id', $request->input('deletebrandid'))->get();
            $imgName = 'images/brand/' . $imgName[0]->logo_brand;
            File::delete($imgName);
            DB::Table('brand')->where('id', '=',$request->input('deletebrandid'))->delete();
            return redirect('/website/masterbrand'); 
        }else{
            return redirect('/website/masterbrand');
        }
    }

    public function masterproduk(){
        $data = DB::select('SELECT produk.id, produk.nama_produk, produk.foto_produk, produk.deskripsi_produk, produk.stok_produk, produk.harga_reseller, produk.harga_jual, produk.id_brand, brand.nama_brand FROM produk JOIN brand ON produk.id_brand=brand.id');
        $list_brand = DB::Table('brand')->get();
        return view('website/menu/masterproduk', ['datas' => $data, 'brands' => $list_brand]);
    }

    public function insertproduk(Request $request){
        if($request->hasFile('foto_produk')){
            $imageName = time() . '.' . $request->file('foto_produk')->extension();
            $request->file('foto_produk')->move('images/produk', $imageName);
        }else{
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
        DB::Table('produk')->insert($data);
        return redirect('/website/masterproduk');
    }

    public function editproduk(Request $request){
        if($request->hasFile('newfoto_produk')){
            $check = DB::Table('produk')->where('id', '=',$request->input('editid'))->count();
            if ($check > 0){
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
                DB::Table('produk')->where('id', '=',$request->input('editid'))->update($updatedata);
                return redirect('/website/masterproduk');
            }else{
                return redirect('/website/masterproduk');
            }
        }else{
            $check = DB::Table('produk')->where('id', '=',$request->input('editid'))->count();
            $updatedata = array(
                'id_brand' => $request->input('editid_brand'),
                'nama_produk' => $request->input('editnama_produk'),
                'deskripsi_produk' => $request->input('editdeskripsi_produk'),
                'stok_produk' => $request->input('editstok_produk'),
                'harga_reseller' => $request->input('editharga_reseller'),
                'harga_jual' => $request->input('editharga_jual'),
            );
            if ($check > 0){
                DB::Table('produk')->where('id', '=',$request->input('editid'))->update($updatedata);
                return redirect('/website/masterproduk');
            }else{
                return redirect('/website/masterproduk');
            }
        }
    }

    public function deleteproduk(Request $request){
        $check = DB::Table('produk')->where('id', '=',$request->input('deleteprodukid'))->count();
        if ($check > 0){
            $imgName = DB::Table('produk')->select('foto_produk')->where('id', $request->input('deleteprodukid'))->get();
            $imgName = 'images/produk/' . $imgName[0]->foto_produk;
            File::delete($imgName);
            DB::Table('produk')->where('id', '=',$request->input('deleteprodukid'))->delete();
            return redirect('/website/masterproduk');
        }else{
            return redirect('/website/masterproduk');
        }
    }
}
