<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mapel;
use App\Models\Tingkat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_siswa = User::with('tingkat')->where('role', 'siswa')->count();
        $total_tingkat = Tingkat::count();
        $total_mapel = Mapel::count();
        $total_admin = User::where('role', 'admin')->count();
        return view('dashboard.index', compact(['total_siswa', 'total_tingkat', 'total_mapel', 'total_admin']));
    }
}
