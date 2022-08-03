<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

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
}
