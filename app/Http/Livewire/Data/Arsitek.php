<?php

namespace App\Http\Livewire\Data;

use App\Models\Arsitek as ModelArsitek;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Arsitek extends Component
{
    public $data;

    public function mount()
    {
        $this->data = ModelArsitek::latest()->get();
        // foreach ($this->data as $d) {
        //     $foto = Storage::get($d->ktp);
        //     dd($foto);
        // }
    }

    public function detail($id)
    {
        // dd('masuk');
        return redirect()->route('arsitek.verif.detail', $id);
    }

    public function render()
    {
        return view('livewire.data.arsitek');
    }
}
