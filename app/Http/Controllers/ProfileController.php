<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\File;
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

    public function ganti_profile()
    {
        return view('profile.ganti-profile');
    }

    public function change(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'mimes:jpg,jpeg,png|max:1024',
            ]);
        }
        $data = [
            'nama' => $request->nama
        ];
        if ($request->hasFile('avatar')) {
            $path = public_path('avatar/' . auth()->user()->avatar);
            if (auth()->user()->avatar != 'default.png') {
                if (File::exists($path)) {
                    unlink($path);
                }
            }
            $avatar_baru = $request->file('avatar');
            $nama_avatar = auth()->user()->id . '-' . auth()->user()->nama . '.' . $avatar_baru->getClientOriginalExtension();
            $avatar_baru->move(public_path('avatar'), $nama_avatar);
            $data['avatar'] = $nama_avatar;
        } else {
            $data['avatar'] = $request->avatar_default;
        }
        // dd($data);
        User::find(auth()->user()->id)->update($data);
        return redirect()->route('ganti-profile')->with('flash', 'Profile berhasil diganti');
    }
}
