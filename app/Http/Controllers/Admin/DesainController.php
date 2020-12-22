<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesainController extends Controller
{
    public function __invoke()
    {
        return view('Arsitek.desain.index', [
            'title'         => 'desain',
            'subtitle'      => '',
            'active'        => 'desain',
        ]);
    }

    public function create()
    {
        return view('Arsitek.desain.tambah', [
            'title'         => 'desain',
            'subtitle'      => 'create',
            'active'        => 'desain',
        ]);
    }

    public function detail($id)
    {
        return view('Arsitek.desain.detail', [
            'title'         => 'desain',
            'subtitle'      => 'create',
            'active'        => 'desain',
            'id'            => $id
        ]);
    }
}
