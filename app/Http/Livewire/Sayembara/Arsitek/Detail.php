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

    public $sayembaraId, $nama, $awal, $akhir, $luas, $konsep, $harga, $pelanggan, $desain, $status, $temp;

    public function mount($id)
    {
        $data = Sayembara::find($id);
        $transaksi = Transaksi::where('arsitek_id', auth()->user()->arsitek->id)
            ->where('sayembara_id', $data->id)
            ->first();
        if ($transaksi->desain) {
            $this->desain = $transaksi->desain->gambar;
        } else {
            $this->desain = null;
        }
        $this->sayembaraId = $data->id;
        $this->nama = $data->nama;
        $this->awal = $data->tanggal;
        $this->akhir = $data->akhir;
        $this->luas = $data->luas_bangunan;
        $this->pelanggan = $data->pelanggan->nama_depan . ' ' . $data->pelanggan->nama_belakang;
        $this->konsep = $data->konsep->nama;
        $this->harga = $data->konsep->harga;
        $this->status = $data->status;
    }

    protected $rules = [
        'temp'  => 'required|image|mimes:jpg,png|max:5000'
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

        $this->validate();
        $file = $this->temp;
        $desain = 'desain_' . time() . '_' . auth()->user()->arsitek->nama_depan . '.' . $file->getClientOriginalExtension();

        $alamat_desain = $this->temp->storeAs('foto/arsitek/desain', $desain);
        // dd($alamat_desain);

        $data = Transaksi::where([
            ['sayembara_id', '=', $this->sayembaraId],
            ['arsitek_id', '=', auth()->user()->arsitek->id]
        ])->first();
        $desain = Desain::create([
            'nama' => 'Sayembara ' . $this->nama,
            'gambar'  => $alamat_desain,
            'arsitek_id' => auth()->user()->arsitek->id,
            // 'status' => 'diproses'
        ]);

        $data->update([
            'desain_id' => $desain->id,
            'total' => $this->harga * $this->luas,
            'status' => 'diproses'
        ]);
        session()->flash('message', 'Data Desain Sudah Ditambah menunggu persetujuan pelanggan.');
        return redirect()->route('sayembara.index');
    }

    public function render()
    {
        return view('livewire.sayembara.arsitek.detail');
    }
}
