<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait LoginTrait
{
    public function redirectTo()
    {
        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        return redirect('/siswa');
    }
}
