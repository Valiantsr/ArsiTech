<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';

    protected $fillable = [
        'nama',
        'deskripsi',
        'arsitek_id'
    ];

    public function sayembara()
    {
        return $this->hasMany('App\Models\Sayembara');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\DetailPorto');
    }
}
