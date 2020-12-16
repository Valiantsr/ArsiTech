<?php

namespace App\Http\Livewire\Data;

use App\Models\Konsep as ModelsKonsep;
use Livewire\Component;

class Konsep extends Component
{
    public $data;

    public function mount()
    {
        $this->data = ModelsKonsep::all();
        // dd($this->data);
    }

    public function tambah()
    {
        return redirect()->route('konsep.create');
    }

    public function edit($id)
    {
        return redirect()->route('konsep.edit', $id);
    }

    public function render()
    {
        return view('livewire.data.konsep');
    }
}
