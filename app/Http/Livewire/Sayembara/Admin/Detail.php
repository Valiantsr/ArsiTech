<?php

namespace App\Http\Livewire\Sayembara\Admin;

use App\Models\Pembayaran;
use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;

class Detail extends Component
{
    public $sayembaraId, $transaksiId, $nama, $awal, $akhir, $luas, $konsep, $harga, $pelanggan, $status, $atas_nama, $rek, $bukti;

    public function mount($id)
    {
        $data = Sayembara::find($id);
        // dd($data);
        $transaksi = Transaksi::where('status', 'dipilih')
            ->where('sayembara_id', $data->id)
            ->first();
        $pembayaran = Pembayaran::where('transaksi_id', $transaksi->id)->first();
        // dd($data, $transaksi, $pembayaran);

        $this->sayembaraId = $data->id;
        $this->transaksiId = $transaksi->id;
        $this->nama = $data->nama;
        $this->awal = $data->tanggal;
        $this->akhir = $data->akhir;
        $this->luas = $data->luas_bangunan;
        $this->pelanggan = $data->pelanggan->nama_depan . ' ' . $data->pelanggan->nama_belakang;
        $this->konsep = $data->konsep->nama;
        $this->harga = $data->konsep->harga;
        $this->status = $data->status;
        // dd($this->status);
        $this->atas_nama = $pembayaran->atas_nama;
        $this->rek = $pembayaran->no_rekening;
        $this->bukti = $pembayaran->bukti;
    }

    public function verifikasi()
    {
        $data = Transaksi::find($this->transaksiId);
        $data->sayembara->update([
            'status' => 'selesai'
        ]);
        session()->flash('message', 'Data Sayembara ' . $data->sayembara->nama . ' telah diverifikasi.');
        return redirect()->route('sayembara.verif.index');
    }

    public function kembali()
    {
        return redirect()->route('sayembara.verif.index');
    }

    public function render()
    {
        return view('livewire.sayembara.admin.detail');
    }
}
