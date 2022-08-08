<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;

class PesananController extends Controller
{
    public function insert(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'brand' => 'required',
            'produk' => 'required',
            'kuantitas' => 'required',
            'tanggal_pengambilan' => 'required',
        ]);

        $status = $request->status;
        if(!$request->status){
            $status = 'belum bayar';
        }
        
        $data = [
            'id_user' => $request->user,
            'id_brand' => $request->brand,
            'id_produk' => $request->produk,
            'kuantitas' => $request->kuantitas,
            'status' => $status,
            'tanggal_pengambilan' => $request->tanggal_pengambilan
        ];

        if(PesananModel::create($data)){
            return redirect()->back()->with('success', 'DATA PESANAN BERHASIL DITAMBAHKAN');
        }
        return redirect()->back()->with('failed', 'DATA PESANAN GAGAL DITAMBAHKAN');
    }

    public function delete(Request $request)
    {
        if (PesananModel::where('id', $request->id)->delete()) {
            return redirect()->back()->with('success', 'DATA PESANAN BERHASIL DIHAPUS');
        }
        return redirect()->back()->with('failed', 'DATA PESANAN GAGAL DIHAPUS');
    }

    public function updateStatusPesanan(Request $request, $id)
    {
        $result = PesananModel::find($id);
        if ($result->status == 'belum bayar') {
            $status = 'sudah bayar';
        } else {
            $status = 'belum bayar';
        }
        if (PesananModel::where('id', $id)->update(['status' => $status])) {
            return redirect()->back()->with('success', 'STATUS PEMBAYARAN BERHASIL DIUPDATE');
        }
        return redirect()->back()->with('failed', 'STATUS PEMBAYARAN GAGAL DIUPDATE');
    }
}
