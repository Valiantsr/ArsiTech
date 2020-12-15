<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsep extends Model
{
    use HasFactory;

    protected $table = 'konsep';

    protected $fillable = [
        'nama',
        'harga',
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
