<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Berita;

class Penghargaan extends Component
{
    public function loadBerita()
    {
        $query = Berita::query();

        // Fetch the latest 3 berita for the selected category or all
        $this->latestBerita = $query->where('kategori', 'penghargaan')->latest()->get();
    }
    public function render()
    {
        $this->loadBerita();
        return view('livewire.penghargaan',[
            'latestBerita' => $this->latestBerita
            ])->layout('layouts.mobile');
    }
}
