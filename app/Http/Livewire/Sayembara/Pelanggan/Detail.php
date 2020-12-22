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
        $tolak = $data->update([
            'status' => 'ditolak'
        ]);
        session()->flash('message', 'Data Penawaran ' . $data->arsitek->nama_depan . ' ' . $data->arsitek->nama_belakang . ' Berhasil ditolak.');
        return redirect()->route('pelanggan.sayembara.detail', $id);
    }

    public function setuju($id)
    {
        $data = Transaksi::find($id);
        // dd($data->sayembara);
        $tolak = Transaksi::where('sayembara_id', $data->sayembara->id)
            ->whereNotIn('id', [$id])->get();
        // dd($tolak);
        $data->update([
            'status' => 'dipilih'
        ]);
        $data->sayembara->update([
            'status' => 'menunggu pembayaran'
        ]);
        foreach ($tolak as $t) {
            $t->update([
                'status' => 'ditolak'
            ]);
        }
        session()->flash('message', 'Data Penawaran ' . $data->arsitek->nama_depan . ' ' . $data->arsitek->nama_belakang . ' Berhasil dipilih.');
        return redirect()->route('pelanggan.sayembara.detail', $id);
    }

    public function kembali()
    {
        return redirect()->route('pelanggan.sayembara.index');
    }

    public function render()
    {
        return view('livewire.sayembara.pelanggan.detail');
    }
}
