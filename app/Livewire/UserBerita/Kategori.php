<?php

namespace App\Livewire\UserBerita;

use Livewire\Component;
use App\Models\Kategori as kategoriModel;

class Kategori extends Component
{

    public $kategoris; 
    public $nama_kategori;

    public function mount()
    {
        $this->kategoris = kategoriModel::all();
    }
    public function kategori($kategori)
    {
        return redirect()->route('berita')->with('kategori', $kategori);
    }
    public function render()
    {
        return view('livewire.user-berita.kategori')->layout('layouts.mobile');
    }
}