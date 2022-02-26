<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pegawai;
use App\Models\Pinjam;
use App\Models\Servis;
use App\Models\User;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pegawai = Pegawai::count();
        $kendaraan = Kendaraan::count();
        $servis = Servis::count();
        $pinjam = Pinjam::count();
        $data = User::all();
        return view('home', compact('data','pinjam','servis','pegawai', 'kendaraan'));
    }
}
