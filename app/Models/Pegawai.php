<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Pegawai extends Model
{
    use HasFactory;
    protected $dates=['created_at'];
    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'jeniskelamin',
        'email',
        'no_hp',
        'tanggallahir'
    ];
    public function kendaraan(){
        return $this->belongsTo(kendaraan::class);
    }

}
