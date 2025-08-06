<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

use App\Models\Berita;

class DetailBerita extends Component
{
    public $id_berita;
    public $berita;

    public function mount($id_berita)
    {
        $this->id_berita = $id_berita;
        $this->berita = berita::find($id_berita);
    }

    public function render()
    {
        $otherBerita = Berita::latest()->take(3)->get();

        return view('livewire.detail-berita', [
            'otherBerita' => $otherBerita
        ])->layout('layouts.mobile');
    }
}
