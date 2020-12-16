<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonsepController extends Controller
{
    public function index()
    {
        return view('admin.konsep.index', [
            'title' => 'konsep',
            'subtitle' => '',
            'active' => 'konsep'
        ]);
    }

    public function create()
    {
        return view('admin.konsep.tambah', [
            'title' => 'konsep',
            'subtitle' => 'create',
            'active' => 'konsep'
        ]);
    }

    public function edit($id)
    {
        return view('admin.konsep.ubah', [
            'title' => 'konsep',
            'subtitle' => 'edit',
            'active' => 'konsep',
            'id' => $id
        ]);
    }
}
