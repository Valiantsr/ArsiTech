<?php

namespace App\Http\Livewire\Desain;

use App\Models\Desain;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $gambar, $nama;

    protected $rules = [
        'nama' => 'required|string',
        'gambar'  => 'required|image|mimes:jpg,png|max:5000'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $file = $this->gambar;
        $gambar = 'desain_' . time() . '_' . auth()->user()->arsitek->nama_depan . '.' . $file->getClientOriginalExtension();
        $alamat_gambar = $this->gambar->storeAs('foto/arsitek/desain', $gambar);
        Desain::create([
            'nama' => $this->nama,
            'gambar'  => $alamat_gambar,
            'arsitek_id' => auth()->user()->arsitek->id
        ]);
        session()->flash('message', 'Data Desain Berhasil Ditambah.');
        return redirect()->route('desain.index');
    }

    public function render()
    {
        return view('livewire.desain.create');
    }
}
