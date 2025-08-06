<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\kebijakan;

class KebijakanMutu extends Component
{
    public function mount()
    {
        $this->Kebijakans = kebijakan::query()
            ->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.kebijakan-mutu',[
            'Kebijakans' => $this->Kebijakans,
        ])->layout('layouts.mobile');
    }
}
