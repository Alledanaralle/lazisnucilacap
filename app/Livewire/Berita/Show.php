<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use App\Models\berita;


class Show extends Component
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
        return view('livewire.berita.show');
    }
}
