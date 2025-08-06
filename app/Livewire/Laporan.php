<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\laporan as LaporanModel;

class Laporan extends Component
{
    public $kategori;
    public $latestBerita;
    public $laporan;

    public function loadBerita()
    {
        $this->laporan = LaporanModel::latest()->get();

        // Query for the 'Berita' model
        $query = Berita::query();

        // Initialize latestBerita as an empty collection to avoid null errors
        $this->latestBerita = collect();

        // Query for the 'Kategori' model to get the ID of 'Laporan & Publikasi'
        $kategoriLaporan = Kategori::where('nama_kategori', 'Laporan & Publikasi')->first();

        // If the specific category 'Laporan & Publikasi' exists, filter by this category's ID
        if ($kategoriLaporan) {
            $this->latestBerita = $query->where('id_kategori', $kategoriLaporan->id)->latest()->get();
        }

        // If no berita found in 'Laporan & Publikasi', load the latest berita across all categories
        if ($this->latestBerita->isEmpty()) {
            $this->latestBerita = Berita::latest()->get();
        }
    }


    public function render()
    {
        $this->loadBerita();

        return view('livewire.laporan', [
            'latestBerita' => $this->latestBerita,
            'laporan' => $this->laporan
        ])->layout('layouts.mobile');
    }
}
