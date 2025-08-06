<?php

namespace App\Livewire;

use Livewire\Component;

class QrDonasi extends Component
{
    public function render()
    {
        return view('livewire.qr-donasi')->layout('layouts.mobile');
    }
}
