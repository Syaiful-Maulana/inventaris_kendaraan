<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_id',
        'Unit',
        'Tanggal',
        'Keperluan'
    ];
    public static function join(){
        $data = DB::table('pinjams')
        ->join('users', 'users.id', 'pinjams.nama_id')
        ->select('pinjams.*', 'users.name as users','users.id as ids' )
        ->get();
        return $data;
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
