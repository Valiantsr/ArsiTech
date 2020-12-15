<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPorto extends Model
{
    use HasFactory;

    protected $table = 'detail_portofolio';

    protected $fillable = [
        'portofolio_id',
        'desain_id',
        'konsep_id'
    ];

    public function desain()
    {
        return $this->belongsTo('App\Models\Desain');
    }

    public function konsep()
    {
        return $this->belongsTo('App\Models\Konsep');
    }

    public function portofolio()
    {
        return $this->belongsTo('App\Models\Portofolio');
    }
}
