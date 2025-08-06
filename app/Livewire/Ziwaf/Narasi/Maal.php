<?php

namespace App\Livewire\Ziwaf\Narasi;

use Livewire\Component;

class Maal extends Component
{

    public function data()
    {
        return redirect()->route('zakat')->with('data', 'maal');
    }

    public function render()
    {
        return view('livewire.ziwaf.narasi.maal')->layout('layouts.mobile');
    }
}
