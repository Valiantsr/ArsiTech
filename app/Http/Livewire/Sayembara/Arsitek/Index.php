<?php

namespace App\Http\Livewire\Sayembara\Arsitek;

use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $verif, $waiting;

    public function mount()
    {
        $this->verif = Sayembara::where('status', 'terverifikasi')->get();
        $this->waiting = Transaksi::where([
            ['status', '=', 'menunggu desain'],
            ['arsitek_id', '=', auth()->user()->arsitek->id]
        ])->get();
        // dd($this->waiting);
    }

    public function join($id)
    {
        $data = Sayembara::find($id);
        $data->update([
            'status' => 'menunggu'
        ]);
        Transaksi::create([
            'sayembara_id'  => $data->id,
            'total'         => 0,
            'arsitek_id'    => auth()->user()->arsitek->id,
            'status'        => 'menunggu desain'
        ]);
        session()->flash('message', 'Data ' . $data->nama . ' Berhasil diikuti.');
        return redirect()->route('sayembara.detail', $id);
    }

    public function desain($id)
    {
        // dd('masuk');
        return redirect()->route('sayembara.detail', $id);
    }

    public function render()
    {
        return view('livewire.sayembara.arsitek.index');
    }
}
