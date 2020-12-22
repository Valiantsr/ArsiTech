<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayembara extends Model
{
    use HasFactory;

    protected $table = 'sayembara';

    protected $fillable = [
        'nama',
        'konsep_id',
        'status',
        'tanggal',
        'akhir',
        'luas_bangunan',
        'pelanggan_id',
        'status',
        'read'
    ];

    public function pelanggan()
    {
        return $this->belongsTo('App\Models\Pelanggan');
    }

    public function konsep()
    {
        return $this->belongsTo('App\Models\Konsep');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi');
    }
}
