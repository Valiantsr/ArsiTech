<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function __invoke()
    {
        return view('Pelanggan.pembayaran.index', [
            'title'     => 'pembayaran',
            'subtitle'  => '',
            'active'    => 'pembayaran.index',
        ]);
    }

    public function create($id)
    {
        // dd('masuk');
        return view('Pelanggan.pembayaran.tambah', [
            'title'     => 'pembayaran',
            'subtitle'  => 'tambah',
            'active'    => 'pembayaran.create',
            'id'        => $id
        ]);
    }

    public function detail($id)
    {
        return view('Pelanggan.pembayaran.detail', [
            'title'     => 'pembayaran',
            'subtitle'  => 'detail',
            'active'    => 'pembayaran.index',
            'id'        => $id
        ]);
    }
}
