<?php

namespace App\Http\Controllers\Arsitek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SayembaraController extends Controller
{
    public function index()
    {
        return view('Arsitek.sayembara.index', [
            'title'         => 'sayembara',
            'subtitle'      => '',
            'active'        => 'sayembara',
        ]);
    }

    public function detail($id)
    {
        return view('arsitek.sayembara.detail', [
            'title'         => 'sayembara',
            'subtitle'      => 'detail',
            'active'        => 'sayembara',
            'id'            => $id
        ]);
    }
}
