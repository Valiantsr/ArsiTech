<?php

namespace App\Http\Livewire\Sayembara\Pelanggan;

use App\Models\Sayembara;
use Livewire\Component;

class Index extends Component
{
    public $data;
    public function mount()
    {
        $this->data = Sayembara::where('pelanggan_id', auth()->user()->pelanggan->id)->get();
        // dd($this->data);
    }

    public function detail($id)
    {
        return redirect()->route('pelanggan.sayembara.detail', $id);
    }

    public function render()
    {
        return view('livewire.sayembara.pelanggan.index');
    }
}
