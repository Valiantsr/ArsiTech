<?php

namespace App\Http\Livewire\Portofolio;

use App\Models\DetailPorto;
use App\Models\Portofolio;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class Index extends Component
{
    public $portoId, $nama, $deskripsi, $detail = [];

    public function mount()
    {
        $data = Portofolio::where('arsitek_id', \Auth::user()->arsitek->id)->first();
        if ($data) {
            $det = DetailPorto::where('portofolio_id', $data->id)->get();

            $this->portoId = $data->id;
            $this->nama = $data->nama;
            $this->deskripsi = $data->deskripsi;
            $this->detail = $det;
        }
    }

    public function tambah()
    {
        return redirect()->route('portofolio.create');
    }

    public function detail($id)
    {
        return redirect()->route('desain.detail', $id);
    }

    public function destroy($id)
    {
        $target = DetailPorto::find($id);
        // dd($target);
        $target->delete();

        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('portofolio.index');
    }

    public function render()
    {
        return view('livewire.portofolio.index');
    }
}
