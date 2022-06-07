<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index',[
            'user' => User::get()
        ]);
    }
    public function insert_pengguna(Request $request)
    {
        if($request->isMethod('POST')){
            $validatedData = $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'email' => 'required|email:dns',
                'role_users' => 'required',
                'password' => 'required'
            ]);
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['password_temp'] = $request->password;
            User::create($validatedData);
            return redirect('/daftarpengguna')->with('success','Pengguna berhasil ditambahkan');
        }else{
            return view('pengguna.insert');
        }
    }
    public function update_pengguna(Request $request, User $user)
    {
        if($request->isMethod('POST')){
            $validatedData = $request->validate([
                'username' => 'required',
                'nama' => 'required',
                'email' => 'required|email:dns',
                'role_users' => 'required',
                'password' => 'required'
            ]);
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['password_temp'] = $request->password;
            User::where('id_user',$user->id_user)->update($validatedData);
            return redirect('/daftarpengguna')->with('success','Pengguna berhasil diubah');
        }else{
            return view('pengguna.update',[
                'user' => $user
            ]);
        }
    }
    public function delete_pengguna(User $user)
    {
        User::where('id_user',$user->id_user)->delete();
        return redirect('/daftarpengguna')->with('success','Pengguna berhasil dihapus');
    }

}
