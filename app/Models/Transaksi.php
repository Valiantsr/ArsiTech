<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'sayembara_id',
        'desain_id',
        'arsitek_id',
        'total',
        'status'
    ];

    public function desain()
    {
        return $this->belongsTo('App\Models\Desain');
    }

    public function sayembara()
    {
        return $this->belongsTo('App\Models\Sayembara');
    }

    public function arsitek()
    {
        return $this->belongsTo('App\Models\Arsitek');
    }
}
