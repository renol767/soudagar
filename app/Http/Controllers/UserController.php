<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'no_telp' => 'required'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ];

        if($request->password){
            $data = array_merge($data, ['password'=>Hash::make($request->password)]);
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move('images/profil', $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        if(User::where('id', $request->id)->update($data)){
            return redirect()->back()->with('success', 'PROFIL BERHASIL DIUPDATE');
        }
        return redirect()->back()->with('failed', 'PROFIL GAGAL DIUPDATE');
    }
}
