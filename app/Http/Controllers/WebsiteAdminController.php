<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
}
