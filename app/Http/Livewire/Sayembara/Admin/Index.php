<?php

namespace App\Http\Livewire\Sayembara\Admin;

use App\Models\Sayembara;
use Livewire\Component;

class Index extends Component
{
    public $data;

    public function mount()
    {
        $this->data = Sayembara::all();
        // dd($this->data[1]);
    }

    public function verifikasi($id)
    {
        $data = Sayembara::find($id);
        $data->update([
            'status' => 'terverifikasi'
        ]);
        session()->flash('message', 'Data Sayembara ' . $data->nama . ' telah diverifikasi');
        return redirect()->route('sayembara.verif.index');
    }

    public function detail($id)
    {
        return redirect()->route('sayembara.verif.pembayaran', $id);
    }

    public function render()
    {
        return view('livewire.sayembara.admin.index');
    }
}
