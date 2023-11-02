<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
        $title = "Login";
        return view('user.login', compact('title'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('loginError', 'Login gagal, username atau password salah !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }


    public function index()
    {
        //

        $data = Masyarakat::firstWhere('id', auth()->user()->id);
        $title = "Profile";
        return view('admin.profile.index', compact('title', 'data'));
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
        //
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
        $user = User::firstWhere('id', auth()->user()->id);
        $title = "Profile";
        return view('admin.profile.index', compact('title', 'user'));
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
        $title = "Profile";
        return view('admin.profile.edit', compact('title', 'user'));
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
        $rules = [
            'username' => 'required',
            'email' => 'required',
            'password' => ['nullable', 'min:4'],
        ];

        if ($request->username == $user->username) {
            $rules['username'] = 'required';
        } else {
            $rules['username'] = 'unique:users|min:4|required';
        }

        if ($request->email == $user->email) {
            $rules['email'] = 'required';
        } else {
            $rules['email'] = 'unique:users|required';
        }

        $validatedData = $request->validate($rules);

        if ($request->password == null && $request->password2 == null) {
            $validatedData['password'] = $user->password;
        } else if ($request->password != $request->password2) {
            return redirect()->back()->with('error', 'Konfirmasi Password tidak sama');
        } else {
            $validatedData['password'] = Hash::make($request->password);
        }

        // return $validatedData;
        $user->update($validatedData);
        return redirect('/admin/profile')->with('success', 'Data Berhasil Diperbarui');
        // User::where('id', $request->id)->update([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // $title = 'success';
        // $pesan = 'Data Berhasil Diperbarui';

        // $title = 'error';
        // $pesan = 'Konfirmasi Password Tidak Sama';
    }


    public function updatePassword(Request $request, User $user)
    {
        return $request;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
