<?php

namespace App\Http\Livewire\Sayembara\Arsitek;

use App\Models\Desain;
use App\Models\Sayembara;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $sayembaraId, $nama, $awal, $akhir, $luas, $konsep, $harga, $pelanggan, $desain;

    public function mount($id)
    {
        $data = Sayembara::find($id);
        // dd($data);
        $this->sayembaraId = $data->id;
        $this->nama = $data->nama;
        $this->awal = $data->tanggal;
        $this->akhir = $data->akhir;
        $this->luas = $data->luas_bangunan;
        $this->pelanggan = $data->pelanggan->nama_depan . ' ' . $data->pelanggan->nama_belakang;
        $this->konsep = $data->konsep->nama;
        $this->harga = $data->konsep->harga;
    }

    protected $rules = [
        'desain'  => 'required|image|mimes:jpg,png|max:5000'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function kembali()
    {
        return redirect()->route('sayembara.index');
    }

    public function desain()
    {
        // Transaksi::where('sayembara_id', $this->sayembaraId)
        //     ->where('arsitek_id,', auth()->user()->arsitek->id)
        //     ->first();
        // dd($data);
        $this->validate();
        $file = $this->desain;
        $desain = 'desain_' . time() . '_' . auth()->user()->arsitek->nama_depan . '.' . $file->getClientOriginalExtension();
        // dd($desain);
        $alamat_desain = $this->desain->storeAs('foto/arsitek/desain', $desain);

        $data = Transaksi::where([
            ['sayembara_id', '=', $this->sayembaraId],
            ['arsitek_id', '=', auth()->user()->arsitek->id]
        ])->first();
        $desain = Desain::create([
            'nama' => 'Sayembara ' . $this->nama,
            'gambar'  => $alamat_desain,
            'arsitek_id' => auth()->user()->arsitek->id
        ]);

        $data->update([
            'desain_id' => $desain->id,
            'total' => $this->harga * $this->luas
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Desain Berhasil di Unggah']);
    }

    public function render()
    {
        return view('livewire.sayembara.arsitek.detail');
    }
}
