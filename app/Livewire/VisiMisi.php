<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\misi;
use App\Models\visi;

class VisiMisi extends Component
{
    public function mount()
    {
        $this->visis = visi::query()
            ->latest()
            ->get();
        // Debugging: Check if visis data is fetched
        $this->visis = visi::query()
            ->latest()
            ->get();

        $this->misis = misi::query()
            ->latest()
            ->get();
        // Debugging: Check if misis data is fetched
        // dd($this->misis);
    }

    public function render()
    {
        return view('livewire.visi-misi',[
            'visis' => $this->visis,
            'misis' => $this->misis
        ]);
    }
}
