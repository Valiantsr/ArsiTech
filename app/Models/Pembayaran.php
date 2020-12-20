<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'bukti',
        'atas_nama',
        'transaksi_id',
        'no_rekening',
    ];

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi');
    }
}
