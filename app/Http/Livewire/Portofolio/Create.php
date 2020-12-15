<?php

namespace App\Http\Livewire\Portofolio;

use App\Models\Desain;
use App\Models\DetailPorto;
use App\Models\Konsep;
use App\Models\Portofolio;
use Livewire\Component;

class Create extends Component
{
    public $portoId, $nama, $deskripsi, $desain, $data1, $data;

    public function mount()
    {
        $data = Portofolio::where('arsitek_id', \Auth::user()->arsitek->id)->get();
        $this->desain = Desain::where('arsitek_id', \Auth::user()->arsitek->id)->get();
        // dd($cek);
        if ($data->isEmpty()) {
        } else {
            $this->portoId = $data->id;
            $this->nama = $data->nama;
            $this->deskripsi = $data->deskripsi;
        }
    }

    protected $rules = [
        'nama'  => 'required|string',
        'deskripsi' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $porto = Portofolio::create([
            'nama'          => $this->nama,
            'deskripsi'     => $this->deskripsi,
            'arsitek_id'    => \Auth::user()->arsitek->id
        ]);

        DetailPorto::create([
            'portofolio_id' => $porto->id,
            'desain_id'     => $this->data1,
            'konsep_id'     => $this->data
        ]);

        session()->flash('message', 'Data Portofolio ' . $this->nama . ' Berhasil Ditambahkan.');
        return redirect()->route('portofolio.index');
    }

    public function render()
    {
        return view('livewire.portofolio.create', [
            'konsep' => Konsep::all(),
            // 'desain' => Desain::where('arsitek_id', \Auth::user()->arsitek->id)->get()
        ]);
    }
}
