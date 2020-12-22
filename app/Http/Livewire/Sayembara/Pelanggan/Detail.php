<?php

namespace App\Http\Livewire\Sayembara\Pelanggan;

use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;

class Detail extends Component
{
    public $detail, $sayembaraId;

    public function mount($id)
    {
        $data = Sayembara::find($id);
        $detail = Transaksi::where('sayembara_id', $id)
            ->whereNotNull('desain_id')
            ->get();
        // dd($data);
        $this->sayembaraId = $data->id;
        if (count($detail) == 0) {
            $this->detail = [];
            session()->flash('message', 'Data penawaran Sayembara tidak ditemukan atau desain belum di inputkan.');
            return redirect()->route('pelanggan.sayembara.index');
        } else {
            $this->detail = $detail;
        }
    }

    public function tolak($id)
    {
        $data = Transaksi::find($id);
        // $cek =
        // dd($data, $this->sayembaraId);
        $tolak = $data->update([
            'status' => 'ditolak'
        ]);
        $cek = Transaksi::where([
            ['sayembara_id', $this->sayembaraId],
            ['status', 'diproses']
        ])->get();

        if (count($cek) > 0) {
            session()->flash('message', 'Data Penawaran ' . $data->arsitek->nama_depan . ' ' . $data->arsitek->nama_belakang . ' Berhasil ditolak.');
            return redirect()->route('pelanggan.sayembara.detail', $this->sayembaraId);
        } else {
            $data = Sayembara::find($this->sayembaraId);
            $data->update([
                'status' => 'selesai'
            ]);
            session()->flash('message', 'Sayembara Selesai Have a nice day !!!.');
            return redirect()->route('pelanggan.sayembara.index');
        }
    }

    public function setuju($id)
    {
        $data = Transaksi::find($id);
        $tolak = Transaksi::where('sayembara_id', $data->sayembara->id)
            ->whereNotIn('id', [$id])->get();
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
        return redirect()->route('pelanggan.sayembara.index');
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
