<?php

namespace App\Http\Livewire\Sayembara\Pelanggan;

use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;

class Detail extends Component
{
    public $detail;

    public function mount($id)
    {
        $data = Sayembara::find($id);
        $detail = Transaksi::where('sayembara_id', $id)
            ->whereNotNull('desain_id')
            ->get();
        // dd($id, $detail);
        if (count($detail) < 1) {
            $this->detail = [];
            session()->flash('message', 'Data penawaran Sayembara tidak ditemukan atau desain belum di inputkan.');
            return redirect()->route('pelanggan.sayembara.index');
        } else {
            $this->detail = $detail;
        }
    }

    public function tolak($id)
    {
        dd($this->detail);
        $data = Transaksi::find($id);
        $data->update([
            'status' => 'ditolak'
        ]);
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Data sayembara dari arsitek ' . $data->arsitek->nama_depan . $data->arsitek->nama_belakang . ' Ditolak']);
    }

    public function setuju($id)
    {
        $data = Transaksi::find($id);
        $data->update([
            'status' => 'ditolak'
        ]);
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Data sayembara dari arsitek ' . $data->arsitek->nama_depan . $data->arsitek->nama_belakang . ' Disetujui']);
    }

    public function render()
    {
        return view('livewire.sayembara.pelanggan.detail');
    }
}
