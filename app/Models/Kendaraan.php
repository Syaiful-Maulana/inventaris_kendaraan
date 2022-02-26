<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_id',
        'Jenis',
        'Tahun',
        'NoKendaraan',
        'NoBPKB',
        'unitKerja',
        'Kondisi'
    ];

    public static function join(){
        $data = DB::table('kendaraans')
        ->join('pegawais', 'pegawais.id', 'kendaraans.nama_id')
        ->select('kendaraans.*', 'pegawais.nama as pegawais')
        ->get();
        return $data;
    }
    public function pegawai()
    {
        return $this->BelongsTo(Pegawai::class);
    }
}
