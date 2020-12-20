<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SayembaraController extends Controller
{
    public function __invoke()
    {
        return view('Pelanggan.sayembara.index', [
            'title'         => 'sayembara',
            'subtitle'      => '',
            'active'        => 'sayembara.index',
        ]);
    }

    public function create()
    {
        return view('Pelanggan.sayembara.tambah', [
            'title'         => 'sayembara',
            'subtitle'      => 'tambah',
            'active'        => 'sayembara.create',
        ]);
    }

    public function detail($id)
    {
        return view('Pelanggan.sayembara.detail', [
            'title'         => 'sayembara',
            'subtitle'      => 'detail',
            'active'        => 'sayembara.index',
            'id'            => $id
        ]);
    }
}
