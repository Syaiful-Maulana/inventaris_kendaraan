<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function editProses(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect('profile')->with('success', 'Data Berhasil Di Update');
    }
}
