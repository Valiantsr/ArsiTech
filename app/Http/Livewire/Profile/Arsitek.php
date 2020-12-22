<?php

namespace App\Http\Livewire\Profile;

use App\Models\Arsitek as ModelsArsitek;
use Livewire\Component;

class Arsitek extends Component
{
    public $email, $nik, $ktp, $nama, $jenis_kelamin, $tanggal_lahir, $alamat, $no_hp, $no_rek;

    public function mount()
    {
        $data = ModelsArsitek::where('user_id', \Auth::user()->id)->first();
        // dd($data->nik);
        // if ($data) {
        $this->email            = \Auth::user()->email;
        $this->nik              = $data->nik;
        $this->ktp              = $data->ktp;
        $this->nama             = $data->nama_depan . ' ' . $data->nama_belakang;
        $this->jenis_kelamin    = $data->jenis_kelamin;
        $this->tanggal_lahir    = $data->tanggal_lahir;
        $this->alamat           = $data->alamat;
        $this->no_hp            = $data->no_hp;
        if ($data->no_rek) {
            $this->no_rek           = $data->no_rek;
        }
    }

    public function edit()
    {
        return redirect()->route('arsitek.edit');
    }

    public function render()
    {
        return view('livewire.profile.arsitek');
    }
}
