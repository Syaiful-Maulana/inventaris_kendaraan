<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Servis extends Model
{
    use HasFactory;
    public static function join(){
        $data = DB::table('servis')
        ->join('users', 'users.id', 'servis.nama_id')
        ->select('servis.*', 'users.name as users','users.id as ids')
        ->get();
        return $data;
    }
}
