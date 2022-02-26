<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::all();
        $kendaraan = Kendaraan::all();
        return view('Pegawai.index', compact('data', 'kendaraan')) ;
        // return view('Pegawai.index');
    }
    public function add(){
        $kendaraan = Kendaraan::all();
        return view('Pegawai.tambah', compact('kendaraan'));
    }
    public function prosesPegawai(Request $request){

        // $data = Pegawai::create($request->all());
        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'jeniskelamin' => $request->jeniskelamin,
            'no_hp' => $request->no_hp,
            'tanggallahir' => $request->tanggallahir
        ]);
        User::create([
            'name' => $request->nama,
            'username' => $request->nip,
            'email' => $request->email,
            'level' => 'user',
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function edit($id){
        $data = Pegawai::find($id);
        $kendaraan = Kendaraan::all();
        return view('Pegawai.edit', compact('kendaraan', 'data'));
    }
    public function editProses(Request $request, $id){
        $data = Pegawai::find($id);
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->jeniskelamin = $request->jeniskelamin;
        $data->no_hp = $request->no_hp;
        $data->tanggallahir = $request->tanggallahir;
        $data->update();
        // $data->update($request->all());
        return redirect('pegawai')->with('success', 'Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }
}
