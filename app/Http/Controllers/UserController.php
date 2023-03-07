<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('admin.user.index' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if ($request->password != $request->repassword) {
               return redirect()->back()->with('toast_error', 'gagal menambah user! Re-password tidak sama');
         }
         
         $validator = Validator::make($request->all(), [
               'email' => 'required|unique:users',
         ]);

         if ($validator->fails()) {
               return redirect()->back()->with('toast_error', 'Email sudah terdaftar!');
         }

         $user = new User;
         $user->name = $request->nama;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->save();

         return redirect()->back()->with('toast_success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);
        
        if ($request->password == null) {
            $user->update($validate);
        } else {
            if ($request->password != $request->repassword) {
               return redirect()->back()->with('toast_error', 'gagal mengubah data! Re-password tidak sama');
            }
            $password = Hash::make($request->password);
            $validate = array_merge($validate, ['password' => $password]);
            $user->update($validate);
        }
        

        return redirect()->route('user.index')->with('toast_success', 'User berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      //   dd($user);

         $user->delete();

        return redirect()->route('user.index')->with('toast_success', 'User Berhasil Di Hapus!');
    }
}
