<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desain extends Model
{
    use HasFactory;

    protected $table = 'desain';

    protected $fillable = [
        'arsitek_id',
        'gambar',
        'nama'
    ];

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi');
    }
}
