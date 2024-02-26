<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = ('pembayaran');
    protected $fillable = [

        'siswa_id',
        'tgl_bayar',
        'jumlah_bayar',
    ];
    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'siswa_id');
    }
}
