<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Berita;
use App\Models\User;
use App\Models\Donasi;
use App\Models\Mitra;


class Index extends Component
{
    public function mount()
    {
        $this->jumlah_campaign = Campaign::count();
        $this->jumlah_berita = Berita::count();
        $this->jumlah_user = User::count();
        $this->banyak_donasi = Donasi::whereHas('transaction', function ($query) {
            $query->where('status', 'success');
        })->count();
        
        $this->jumlah_donasi = Donasi::sum('jumlah_donasi');
        $this->banyak_mitra = Mitra::count();
    }
    public function render()
    {
        return view('livewire.admin.index', [
            'jumlah_campaign' => $this->jumlah_campaign,
            'jumlah_berita' => $this->jumlah_berita,
            'jumlah_user' => $this->jumlah_user,
            'banyak_donasi' => $this->banyak_donasi,
            'jumlah_donasi' => $this->jumlah_donasi,
            'banyak_mitra' => $this->banyak_mitra,

        ])->layout('layouts.admin');
    }
}
