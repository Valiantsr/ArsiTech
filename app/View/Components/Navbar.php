<?php

namespace App\View\Components;

use App\Models\Transaksi;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function read($id)
    {
        dd('masuk');
        $read = Transaksi::find($id);
        $read->update([
            'read' => true
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (auth()->user()->arsitek) {
            $read = Transaksi::where('arsitek_id', auth()->user()->arsitek->id)->get();
        } else {
            $read = null;
        }

        return view('components.navbar', [
            'data' => $read,
        ]);
    }
}
