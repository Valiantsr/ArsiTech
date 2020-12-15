<?php

namespace App\Http\Livewire\Sayembara\Pelanggan;

// use App\Models\Konsep;

use App\Models\Konsep;
use App\Models\Sayembara;
use Livewire\Component;

class Create extends Component
{
    public $nama, $awal, $akhir, $konsep, $luas_bangunan, $konsepId, $data;

    public function mount()
    {
        $this->konsep = Konsep::all();
        // $this->konsepId = $konsep->id;
    }

    protected $rules = [
        'nama'          => 'required',
        'awal'          => 'required|before:akhir',
        'akhir'         => 'required|after:awal',
        'data'          => 'required',
        'luas_bangunan' => 'required|numeric'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        // dd($this->awal, $this->akhir, $this->konsep);
        $this->validate();
        // dd('masuk');
        Sayembara::create([
            'nama'          => $this->nama,
            'tanggal'       => $this->awal,
            'akhir'         => $this->akhir,
            'konsep_id'     => $this->data,
            'luas_bangunan' => $this->luas_bangunan,
            'pelanggan_id'  => \Auth::user()->pelanggan->id
        ]);

        session()->flash('message', 'Data Sayembara ' . $this->nama . ' Berhasil Ditambah.');

        return redirect()->route('pelanggan.dashboard');
    }

    public function render()
    {
        return view('livewire.sayembara.pelanggan.create', [
            'konsep' => Konsep::all()
        ]);
    }
}
