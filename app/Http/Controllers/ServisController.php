<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServisController extends Controller
{
    public function indexAdmin(){
        $data = Servis::join();
        return view('servis.admin', compact('data'));
    }
    public function index(){
        $user = User::all();
        $data = Servis::join();
        return view('servis.index', compact('data'));
    }
    public function add(){
        return view('servis.tambah');
    }
    public function prosesServis(Request $request){
        $data = new Servis();
        $data->nama_id = Auth::user()->id;
        $data->Type = $request->Type;
        $data->BBM = $request->BBM;
        $data->servis = $request->servis;
        $data->Tanggal = $request->Tanggal;
        $data->nota = $request->nota;
        if($request->hasFile('nota')){
            $request->file('nota')->move('datanota/', $request->file('nota')->getClientOriginalName());
            $data->nota = $request->file('nota')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('servis')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function nota($id){
        $data = Servis::find($id);
        return view('servis.nota', compact('data'));
    }

    public function edit($id){
        $data = Servis::find($id);
        return view('servis.edit', compact('data'));
    }

    public function editProses(Request $request, $id){
        $data = Servis::find($id);
        $data->nama_id = Auth::user()->id;
        $data->Type = $request->Type;
        $data->BBM = $request->BBM;
        $data->servis = $request->servis;
        $data->Tanggal = $request->Tanggal;
        $data->nota = $request->nota;
        if($request->hasFile('nota')){
            $request->file('nota')->move('datanota/', $request->file('nota')->getClientOriginalName());
            $data->nota = $request->file('nota')->getClientOriginalName();
            $data->update();
        }
        $data->update();
        return redirect('servis')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Servis::find($id);
        $data->delete();
        return redirect('servis')->with('success', 'Data Berhasil Di Hapus');
    }

    public function cetakRekap(){
        return view('rekap.servis');
    }

    public function cetakServis($tglawal, $tglakhir){
        // dd("Tanggal awal : ".$tglawal, "Tanggal Akhir :".$tglakhir);
        $data = Servis::join()->whereBetween('Tanggal', [$tglawal, $tglakhir]);
        return view('servis.cetak', compact('data'));
    }
}
