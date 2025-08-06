<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\visi;
use App\Models\misi;

class ProfilJajaran extends Component
{
    public function mount()
    {
        $this->visis = visi::query()
            ->latest()
            ->get();

        $this->misis = misi::query()
            ->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.profil-jajaran',[
            'visis' => $this->visis,
            'misis' => $this->misis,
        ])->layout('layouts.mobile');
    }
}
