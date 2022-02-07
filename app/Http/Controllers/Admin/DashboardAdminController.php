<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mapel;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $total_siswa = User::with('tingkat')->where('role', 'siswa')->count();
        $total_tingkat = Tingkat::count();
        $total_mapel = Mapel::count();
        $total_admin = User::where('role', 'admin')->count();
        return view('dashboard.index', compact(['total_siswa', 'total_tingkat', 'total_mapel', 'total_admin']));
    }
}
