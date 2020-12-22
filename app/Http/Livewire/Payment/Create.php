<?php

namespace App\Http\Livewire\Payment;

use App\Models\Pembayaran;
use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $atas, $nomor, $temp, $bukti, $namaSayembara, $total, $transaksiId, $sayembaraId, $data, $arsitek;

    public function mount($id)
    {
        $sayembara = Sayembara::find($id);
        // $data = Transaksi::;
        // dd($sayembara->transaksi, $id);
        if ($sayembara) {
            $this->transaksiId = $sayembara->transaksi->id;
            $this->sayembaraId = $sayembara->id;
            $this->namaSayembara = $sayembara->nama;
            $this->total = $sayembara->transaksi->total;
            $this->data = $sayembara->transaksi;
            if ($sayembara->transaksi->arsitek->no_rek) {
                $this->arsitek = $sayembara->transaksi->arsitek->no_rek;
            }
        }
    }

    protected $rules = [
        'atas'          => 'required',
        'nomor'         => 'required|numeric',
        'temp'          => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        // dd($this->sayembaraId);
        if ($this->arsitek) {
            $this->validate();

            $file = $this->temp;
            $bukti = 'bukti_' . time() . '_' . auth()->user()->pelanggan->nama_depan . '.' . $file->getClientOriginalExtension();
            // dd($bukti);
            $alamat_bukti = $this->temp->storeAs('foto/pelanggan/bukti', $bukti);

            Pembayaran::create([
                'bukti' => $alamat_bukti,
                'atas_nama' => $this->atas,
                'no_rekening' => $this->nomor,
                'transaksi_id' => $this->sayembaraId
            ]);

            $this->data->sayembara->update([
                'status' => 'verif pembayaran'
            ]);

            session()->flash('message', 'Data Pembayaran sudah diinput menunggu verifikasi.');
            return redirect()->route('pelanggan.sayembara.index');
        } else {
            $this->emit('alert', ['type' => 'error', 'message' => 'Rekening arsitek belum diinputkan hubungi arsitek dulu']);
        }
    }

    public function render()
    {
        return view('livewire.payment.create');
    }
}
