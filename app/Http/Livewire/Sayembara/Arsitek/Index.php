<?php

namespace App\Http\Livewire\Sayembara\Arsitek;

use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $verif, $waiting, $diproses;

    public function mount()
    {
        $this->verif = Sayembara::where('status', 'terverifikasi')
            ->orWhere('status', 'menunggu')
            ->get();
        $this->waiting = Sayembara::where('status', 'menunggu')->get();
        $this->diproses = Transaksi::where('arsitek_id', auth()->user()->arsitek->id)
            ->whereNotNull('desain_id')
            ->get();
        // dd($this->waiting, $this->diproses);
    }

    public function join($id)
    {
        $data = Sayembara::find($id);
        $exist = Transaksi::where([
            ['sayembara_id', '=', $data->id],
            ['arsitek_id', '=', auth()->user()->arsitek->id]
        ])->exists();
        // dd($exist);
        if ($exist) {
            session()->flash('message', 'Data Sudah Ditambah silakan upload desain.');
            return redirect()->route('sayembara.index');
        } else {
            Transaksi::create([
                'sayembara_id'  => $data->id,
                'total'         => 0,
                'arsitek_id'    => auth()->user()->arsitek->id,
                'status'        => 'diproses'
            ]);

            $data->update([
                'status' => 'menunggu'
            ]);

            session()->flash('message', 'Data ' . $data->nama . ' Berhasil diikuti.');
            return redirect()->route('sayembara.detail', $id);
        }
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
