<?php

namespace App\Http\Livewire\Desain;

use App\Models\Desain;
use Livewire\Component;

class Detail extends Component
{
    public $nama, $gambar;

    public function mount($id)
    {
        $data = Desain::find($id);

        if ($data) {
            $this->nama = $data->nama;
            $this->gambar = $data->gambar;
        }
    }

    public function kembali()
    {
        return redirect()->route('desain.index');
    }

    public function render()
    {
        return view('livewire.desain.detail');
    }
}
