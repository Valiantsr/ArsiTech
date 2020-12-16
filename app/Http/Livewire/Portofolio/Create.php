<?php

namespace App\Http\Livewire\Portofolio;

use App\Models\Desain;
use App\Models\DetailPorto;
use App\Models\Konsep;
use App\Models\Portofolio;
use Livewire\Component;

class Create extends Component
{
    public $portoId, $nama, $deskripsi, $datadesain, $desain, $konsep;

    public function mount()
    {
        $data = Portofolio::where('arsitek_id', \Auth::user()->arsitek->id)->first();
        $this->datadesain = Desain::where('arsitek_id', \Auth::user()->arsitek->id)->get();
        // dd($data);
        if ($data) {
            $this->portoId = $data->id;
            $this->nama = $data->nama;
            $this->deskripsi = $data->deskripsi;
        }
    }

    protected $rules = [
        'nama'  => 'required|string',
        'deskripsi' => 'required',
        'konsep' => 'required',
        'desain' => 'required|unique:detail_portofolio,desain_id'
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
            'desain_id'     => $this->desain,
            'konsep_id'     => $this->konsep
        ]);

        session()->flash('message', 'Data Portofolio ' . $this->nama . ' Berhasil Ditambahkan.');
        return redirect()->route('portofolio.index');
    }

    public function render()
    {
        return view('livewire.portofolio.create', [
            'datakonsep' => Konsep::all(),
        ]);
    }
}
