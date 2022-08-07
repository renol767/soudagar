<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function list()
    {
        $data = [
            'title' => 'Blog',
            'blogs' => BlogModel::all()
        ];

        return view('website/blog/list', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Blog'
        ];
        return view('website/blog/create', $data);
    }

    public function insert(Request $request)
    {
        $imageName = '';
        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move('images/blog', $imageName);
        }
        $result = BlogModel::insert([
            'judul' => $request->judul,
            'konten' => $request->konten, 
            'slug' => str_replace(' ', '_',$request->judul),
            'image' => $imageName
        ]);
        if($result){
            return redirect()->back()->with('success','DATA BERHASIL DITAMBAHKAN');
        } else {
            return redirect()->back()->with('failed','DATA GAGAL DITAMBAHKAN');
        }
    }

    public function update(Request $request)
    {
        $imageName = '';
        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten, 
            'slug' => str_replace(' ', '_',$request->judul),
        ];
        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move('images/blog', $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }
        $result = BlogModel::where('id', $request->id)
            ->update($data);
        if($result){
            return redirect()->back()->with('success','DATA BERHASIL DIUPDATE');
        } else {
            return redirect()->back()->with('failed','DATA GAGAL DIUPDATE');
        }
    }

    public function edit(Request $request)
    {
        $data = [
            'title' => 'Edit Blog',
            'blog' => BlogModel::find($request->id)
        ];

        return view('website/blog/edit',$data);
    }

    public function delete(Request $request)
    {
        
        if(BlogModel::where('id', $request->id)->delete()){
            return redirect()->back()->with('success', 'DATA BERHASIL DIHAPUS');
        } 

        return redirect()->back()->with('failed', 'DATA GAGAL DIHAPUS');
    }

    public function publish(Request $request)
    {
        if(BlogModel::where('id', $request->id)->update(['status'=>'publish'])){
            return redirect()->back()->with('success', 'DATA BERHASIL DIUPDATE');
        }
        return redirect()->back()->with('failed', 'DATA GAGAL DIUPDATE');
    }

    public function draft(Request $request)
    {
        if(BlogModel::where('id', $request->id)->update(['status'=>'draft'])){
            return redirect()->back()->with('success', 'DATA BERHASIL DIUPDATE');
        }
        return redirect()->back()->with('failed', 'DATA GAGAL DIUPDATE');
    }

    public function detail($slug = null)
    {
        $blog = BlogModel::where('status', 'publish')->limit(3)->get();
        $detail   = DB::table('blog')
                ->select(DB::raw('MONTH(tanggal) as bulan, DAY(tanggal) as tanggal, judul, konten, image, slug'))
                ->where(['status'=>'publish','slug'=>$slug])
                ->limit(3)->get();
        $namaBulan = [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'Mei', 'Jun', 'Jul', 'Aug', 'Sep',
                    'Okt', 'Nov', 'Des'
                ];
        $data = [
            'title' => '',
            'detail' => $detail,
            'blog' => BlogModel::all(),
            'namaBulan' => $namaBulan,
            'blog' => $blog
        ];

        return view('website/blog/detail', $data);
    }
}
