<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsitek extends Model
{
    use HasFactory;

    protected $table = 'arsitek';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'user_id',
        'nik',
        'ktp',
        'ijazah',
        'no_rek'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
