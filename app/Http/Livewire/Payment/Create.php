<?php

namespace App\Http\Livewire\Payment;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $atas, $nomor, $temp, $bukti, $namaSayembara, $total, $transaksiId, $data;

    public function mount($id)
    {
        $data = Transaksi::find($id);
        // dd($data->total);
        if ($data) {
            $this->transaksiId = $data->id;
            $this->namaSayembara = $data->sayembara->nama;
            $this->total = $data->total;
            $this->data = $data;
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
        // dd($this->data->sayembara);
        $this->validate();

        $file = $this->temp;
        $bukti = 'bukti_' . time() . '_' . auth()->user()->pelanggan->nama_depan . '.' . $file->getClientOriginalExtension();
        // dd($bukti);
        $alamat_bukti = $this->temp->storeAs('foto/pelanggan/bukti', $bukti);

        Pembayaran::create([
            'bukti' => $alamat_bukti,
            'atas_nama' => $this->atas,
            'no_rekening' => $this->nomor,
            'transaksi_id' => $this->transaksiId
        ]);

        $this->data->sayembara->update([
            'status' => 'verif pembayaran'
        ]);

        session()->flash('message', 'Data Pembayaran sudah diinput menunggu verifikasi.');
        return redirect()->route('pelanggan.sayembara.index');
    }

    public function render()
    {
        return view('livewire.payment.create');
    }
}
