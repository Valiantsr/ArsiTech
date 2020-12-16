<?php

namespace App\Http\Livewire\Konsep;

use App\Models\Konsep;
use Livewire\Component;

class Update extends Component
{
    public $konsepId, $nama, $harga;

    public function mount($id)
    {
        $data = Konsep::find($id);
        // dd($data);
        $this->konsepId = $data->id;
        $this->nama     = $data->nama;
        $this->harga    = $data->harga;
    }

    /**
     * rules
     */
    protected $rules = [
        'nama'  => 'required|max:255',
        'harga' => 'required|numeric|min:0|not_in:0'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate();

        $konsep = Konsep::find($this->konsepId);

        $konsep->update([
            'nama'  => $this->nama,
            'harga' => $this->harga,
        ]);

        //flash message
        session()->flash('message', 'Data Konsep ' . $this->nama . ' Berhasil Diupdate.');

        //redirect
        return redirect()->route('konsep.index');
    }

    public function render()
    {
        return view('livewire.konsep.update');
    }
}
