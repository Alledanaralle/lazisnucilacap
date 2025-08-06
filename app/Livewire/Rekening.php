<?php

namespace App\Livewire;

use Livewire\Component;

class Rekening extends Component
{
    public function render()
    {
        return view('livewire.rekening')->layout('layouts.mobile');
    }
}
