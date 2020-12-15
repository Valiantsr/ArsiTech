<?php

namespace App\Http\Livewire\Data;

use App\Models\Desain as ModelsDesain;
use Livewire\Component;

class Desain extends Component
{
    public $data;

    public function mount()
    {
        $this->data = ModelsDesain::all();
    }

    public function tambah()
    {
        return redirect()->route('desain.create');
    }

    public function detail($id)
    {
        return redirect()->route('konsep.detail', $id);
    }

    public function render()
    {
        return view('livewire.data.desain');
    }
}