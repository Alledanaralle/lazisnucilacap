<?php

namespace App\Livewire\UserBerita;

use Livewire\Component;

use App\Models\Berita;
use Illuminate\Support\Str;

class Show extends Component
{
    // public $title_berita;
    public $berita;
    public $berita2;
    

    public function mount($title_berita)
    {
        $slug = Str::slug($title_berita);

        // Find the berita using the slugified title
        $this->berita = Berita::where('title_berita', $slug)->firstOrFail();
        $this->berita2 = $title_berita;
    }

    public function render()
    {
        $otherBerita = Berita::latest()->take(3)->get();

        return view('livewire.user-berita.show', [
            'otherBerita' => $otherBerita,
            'slug' => $this->berita2
        ])->layout('layouts.mobile');
    }
}
