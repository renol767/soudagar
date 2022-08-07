<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = [
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi
        ];

        if(FaqModel::create($data)){
            return redirect()->back()->with('success', 'FAQ BERHASIL DITAMBAHKAN');
        }
        return redirect()->back()->with('failed', 'FAQ GAGAL DITAMBAHKAN');
    }

    public function delete(Request $request)
    {
        if(FaqModel::where('id',$request->id)->delete()){
            return redirect()->back()->with('success', 'FAQ BERHASIL DIHAPUS');
        }
        return redirect()->back()->with('failed', 'FAQ GAGAL DIHAPUS');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = [
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi
        ];

        if(FaqModel::where('id',$request->id)->update($data)){
            return redirect()->back()->with('success', 'FAQ BERHASIL DIUBAH');
        }
        return redirect()->back()->with('failed', 'FAQ GAGAL DIUBAH');
    }
}
