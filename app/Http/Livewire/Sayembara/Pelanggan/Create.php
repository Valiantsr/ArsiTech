<?php

namespace App\Http\Livewire\Sayembara\Pelanggan;

// use App\Models\Konsep;

use App\Models\Konsep;
use App\Models\Sayembara;
use Livewire\Component;

class Create extends Component
{
    public $nama, $awal, $akhir, $data, $luas_bangunan, $konsepId, $konsep, $total;

    public function mount()
    {
        $this->data = Konsep::all();
    }

    protected $rules = [
        'nama'          => 'required',
        'awal'          => 'required|before:akhir',
        'akhir'         => 'required|after:awal',
        'konsep'        => 'required',
        'luas_bangunan' => 'required|numeric'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cekTotal()
    {
        if ($this->konsep) {
            $data = Konsep::find($this->konsep);
            $count = $this->luas_bangunan * $data->harga;
            if ($this->luas_bangunan) {
                $this->total = $count;
            } else {
                $this->emit('alert', ['type' => 'error', 'message' => 'Masukan Luas Bangunan']);
            }
        } else {
            $this->emit('alert', ['type' => 'error', 'message' => 'Masukan Konsep Data']);
        }
    }

    public function store()
    {
        if ($this->total) {
            $data = Konsep::find($this->konsep);
            $count = $this->luas_bangunan * $data->harga;
            if ($this->total == $count) {
                $this->validate();
                // dd('masuk');
                Sayembara::create([
                    'nama'          => $this->nama,
                    'tanggal'       => $this->awal,
                    'akhir'         => $this->akhir,
                    'konsep_id'     => $this->konsep,
                    'luas_bangunan' => $this->luas_bangunan,
                    'pelanggan_id'  => \Auth::user()->pelanggan->id
                ]);

                session()->flash('message', 'Data Sayembara ' . $this->nama . ' Berhasil Ditambah.');
                return redirect()->route('pelanggan.dashboard');
            } else {
                $this->emit('alert', ['type' => 'error', 'message' => 'Klik Button Cek Dahulu']);
            }
        } else {
            $this->emit('alert', ['type' => 'error', 'message' => 'Klik Button Cek Dahulu']);
        }
    }

    public function render()
    {
        return view('livewire.sayembara.pelanggan.create', [
            'data' => Konsep::all()
        ]);
    }
}
