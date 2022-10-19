<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getusers()
    {
        $user = User::get();
        return UserResource::collection($user);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data User';
        $data['q'] = $request->q;
        $data['rows'] = User::where('name', 'like', '%' . $request->q . '%')->get();
        return view('pages.users.index', $data);
    }

    public function add(Request $request)
    {
        $data['title'] = 'Tambah User';
        $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
        return view('pages.users.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_user' => 'required',
    //         'email' => 'required|unique:tb_user',
    //         'password' => 'required',
    //         'level' => 'required'
    //     ]);

    //     $user = new User();
    //     $user->nama_user = $request->nama_user;
    //     $user->email = $request->enail;
    //     $user->password = Hash::make($request->password);
    //     $user->level = $request->level;
    //     $user->save();
    //     return redirect('user')->with('success', 'Tambah Data Berhasil');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $user)
    // {
    //     $data['title'] = 'Ubah User';
    //     $data['row'] = $user;
    //     $data['levels'] = ['admin' => 'Admin', 'user' => 'User'];
    //     return view('user.edit', $data);
    // }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'nama_user' => 'required',
    //         'email' => 'required',
    //         'level' => 'required'
    //     ]);

    //     $user->nama_user = $request->nama_user;
    //     $user->email = $request->email;
    //     if ($request->password)
    //         $user->password = Hash::make($request->password);
    //     $user->level = $request->level;
    //     $user->save();
    //     return redirect('user')->with('success', 'Ubah data berhasil');
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect('user')->with('success', 'Hapus Data Berhasil');
    // }
}
