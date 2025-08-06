<?php

namespace App\Livewire\Ziwaf\Narasi;

use Livewire\Component;

class Fitrah extends Component
{
    public function data()
    {
        return redirect()->route('zakat')->with('data', 'fitrah');
    }
    public function render()
    {
        return view('livewire.ziwaf.narasi.fitrah')->layout('layouts.mobile');
    }
}
