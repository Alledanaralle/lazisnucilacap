<?php

namespace App\Livewire;

use App\Models\Mitra;
use Livewire\Component;


class UserMitra extends Component
{
    public function mount()
    {

        $this->mitras = Mitra::query()
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.user-mitra', [
            'mitras' => $this->mitras,
        ])->layout('layouts.mobile');
    }
}
