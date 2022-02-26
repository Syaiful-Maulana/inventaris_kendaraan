<?php

namespace App\Http\Controllers;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(){
        $pegawai = Pegawai::all();
        $data = Kendaraan::join();
        return view('kendaraan.index', compact('data', 'pegawai'));
    }
    public function add(){
        $pegawai = Pegawai::all();
        return view('kendaraan.tambah', compact('pegawai'));
    }
    public function prosesKendaraan(Request $request){
        Kendaraan::create($request->all());
        return redirect('kendaraan')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function edit($id){
        $data = Kendaraan::find($id);
        $pegawai = Pegawai::all();
        return view('kendaraan.edit', compact('pegawai', 'data'));
    }
    public function editProses(Request $request, $id){
        $data = Kendaraan::find($id);
        $data->update($request->all());
        return redirect('kendaraan')->with('success', 'Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $data = Kendaraan::find($id);
        $data->delete();
        return redirect('kendaraan')->with('success', 'Data Berhasil Di Hapus');
    }
}
