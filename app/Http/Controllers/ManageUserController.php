<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = "Manage User";
        $users = User::latest()->paginate(10);
        return view('admin.manage-user.index', compact('title', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Manage User";
        $masyarakats = Masyarakat::all();
        return view('admin.manage-user.create', compact('title', 'masyarakats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'masyarakat_id' => 'required|unique:users',
            'username' => 'required|unique:users|min:4',
            'email' => 'required|unique:users|email',
            // 'password' => ['required', 'min:4', Password::min(8)],
        ]);

        $cek = Masyarakat::firstWhere('id', $request->masyarakat_id);
        $nik = $cek->nik;

        $validatedData['password'] = Hash::make($nik);

        User::create($validatedData);
        return redirect('/admin/manage-user')->with('success', 'Data akun ' . $request->username . ' berhasil ditambahkan !');;
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
        $title = "Manage User";
        $masyarakats = Masyarakat::all();
        return view('admin.manage-user.detail', compact('title', 'user', 'masyarakats'));
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
        $masyarakats = Masyarakat::all();
        $title = "Manage User";
        return view('admin.manage-user.edit', compact('title', 'user', 'masyarakats'));
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
        //
        $user = User::firstWhere('id', '=', $request->idx);
        $rules = [
            'is_admin' => 'required',
            'password' => ['required', 'min:4', Password::min(8)->numbers()->letters()],
        ];

        if ($request->masyarakat_id == null) {
            $rules['masyarakat_id'] = 'required';
        } else if ($request->masyarakat_id == $user->masyarakat_id) {
            $rules['masyarakat_id'] = 'required';
        } else {
            $rules['masyarakat_id'] = 'required|unique:users';
        }

        if ($request->username == $user->username) {
            $rules['username'] = 'required';
        } else {
            $rules['username'] = 'required|min:4|unique:users';
        }

        if ($request->email == $user->email) {
            $rules['email'] = 'required';
        } else {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request->password == $user->password) {
            $validatedData['password'] = $user->password;
        } else {
            $validatedData['password'] = Hash::make($request->password);
        }

        $user->update($validatedData);

        return redirect('/admin/manage-user')->with('success', 'Data akun ' . $request->username . ' berhasil diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        //
        User::where('id', $request->idx)->delete();
        return redirect('/admin/manage-user')->with('success', 'Data akun ' . $user->username . ' berhasil dihapus !');
    }
}
