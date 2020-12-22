<?php

namespace App\Http\Livewire\Profile\Update;

use App\Models\Arsitek as ModelsArsitek;
use Livewire\Component;

class Arsitek extends Component
{
    public $userId, $email, $nik, $ktp, $nama_depan, $nama_belakang, $jenis_kelamin, $tanggal_lahir, $alamat, $no_hp, $no_rek;

    public function mount()
    {
        $data = ModelsArsitek::where('user_id', \Auth::user()->id)->first();

        $this->userId           = $data->id;
        $this->email            = \Auth::user()->email;
        $this->nik              = $data->nik;
        $this->ktp              = $data->ktp;
        $this->nama_depan       = $data->nama_depan;
        $this->nama_belakang    = $data->nama_belakang;
        $this->jenis_kelamin    = $data->jenis_kelamin;
        $this->tanggal_lahir    = $data->tanggal_lahir;
        $this->alamat           = $data->alamat;
        $this->no_hp            = $data->no_hp;
    }

    /**
     * rules
     */
    protected $rules = [
        'nik'           => 'required|max:255',
        'ktp'           => 'required|max:255',
        'email'         => 'required|email|string|max:255|unique:users,id,id',
        'nama_depan'    => 'required|max:255',
        'nama_belakang' => 'required|max:255',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'alamat'        => 'required|min:15',
        'no_hp'         => 'required',
        'no_rek'        => 'required|numeric'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate();
        // dd($this->alamat);
        $user = \Auth::user();
        $arsitek = ModelsArsitek::where('id', $this->userId)->first();

        $user->update([
            'email' => $this->email
        ]);

        $arsitek->update([
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'nik' => $this->nik,
            'ktp' => $this->ktp,
            'no_rek' => $this->no_rek
        ]);

        //flash message
        session()->flash('message', 'Data ' . $this->nama_depan . ' ' . $this->nama_belakang . ' Berhasil Diupdate.');

        //redirect
        return redirect()->route('arsitek.profil');
    }

    public function render()
    {
        return view('livewire.profile.update.arsitek');
    }
}
