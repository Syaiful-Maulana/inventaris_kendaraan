<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pinjam;
use App\Models\Servis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function indexAdmin(){
        $data = Pinjam::join();
        return view('pinjam.admin', compact('data'));
    }
    public function index(){
    // $posts = Pinjam::with('user')->get();
    $data = Pinjam::join();
    return view('pinjam.index', compact('data'));
    }
    public function add(){
        
        $pegawai = Pegawai::all();
        return view('pinjam.tambah', compact('pegawai'));
    }
    public function prosesPinjam(Request $request){
        $request->validate([
            'Unit' => 'required',
            'Tanggal' => 'required',
            'Keperluan' => 'required'
        ],
        [
            'Unit.required' => 'Unit Kerja tidak boleh kosong',
            'Tanggal.required' => 'Tanggal Pinjam tidak boleh kosong',
            'Keperluan.required' => 'Keperluan tidak boleh kosong'
        ]);
        // Pinjam::create($request->all());
        $data = new Pinjam();
        $data->nama_id = Auth::user()->id;
        $data->Unit = $request->Unit;
        $data->Tanggal = $request->Tanggal;
        $data->Keperluan = $request->Keperluan;
        $data->save();
        return redirect('pinjam')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function edit($id){
        $data = Pinjam::find($id);
        $pegawai = Pegawai::all();
        return view('pinjam.edit', compact('pegawai', 'data'));
    }
    public function editProses(Request $request, $id){
        $request->validate([
            'Unit' => 'required',
            'Tanggal' => 'required',
            'Keperluan' => 'required'
        ],
        [
            'Unit.required' => 'Unit Kerja tidak boleh kosong',
            'Tanggal.required' => 'Tanggal Pinjam tidak boleh kosong',
            'Keperluan.required' => 'Keperluan tidak boleh kosong'
        ]);
        $data = Pinjam::find($id);
        // $data->update($request->all());
        $data->nama_id = Auth::user()->id;
        $data->Unit = $request->Unit;
        $data->Tanggal = $request->Tanggal;
        $data->Keperluan = $request->Keperluan;
        $data->update();
        return redirect('pinjam')->with('success', 'Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $data = Pinjam::find($id);
        $data->delete();
        return redirect('pinjam')->with('success', 'Data Berhasil Di Hapus');
    }

    public function cetakRekap(){
        return view('rekap.pinjam');
    }

    public function cetakPinjam($tglawal, $tglakhir){
        // dd("Tanggal awal : ".$tglawal, "Tanggal Akhir :".$tglakhir);
        $data = Pinjam::join()->whereBetween('Tanggal', [$tglawal, $tglakhir]);
        return view('pinjam.cetak', compact('data'));
    }
}
