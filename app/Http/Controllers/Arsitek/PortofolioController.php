<?php

namespace App\Http\Controllers\Arsitek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function __invoke()
    {
        return view('Arsitek.portofolio.index', [
            'title'         => 'portofolio',
            'subtitle'      => '',
            'active'        => 'portofolio',
        ]);
    }

    public function create()
    {
        return view('Arsitek.portofolio.tambah', [
            'title'         => 'portofolio',
            'subtitle'      => 'create',
            'active'        => 'portofolio',
        ]);
    }
}
