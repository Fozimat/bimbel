<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ganti_password()
    {
        return view('profile.ganti-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', new MatchOldPassword],
            'password_baru' => ['required'],
            'konfirmasi_password' => ['same:password_baru'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password_baru)]);
        return redirect()->route('ganti-password')->with('flash', 'Password berhasil diganti');
    }
}
