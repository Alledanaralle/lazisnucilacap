<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Berita;

class Cerdas extends Component
{
    public $campaigns;
    public $latestBerita;

    public function loadCampaigns()
    {
        $query = Campaign::query();

        // Fetch the latest 3 berita for the selected category or all
        $this->campaigns = $query->latest()->take(3)->get();
    }

    public function loadBerita()
    {
        $query = Berita::query();

        // Fetch the latest 3 berita for the selected category or all
        $this->latestBerita = $query->latest()->take(3)->get();
    }
    public function render()
    {
        $this->loadCampaigns();
        $this->loadBerita();
        return view('livewire.cerdas', [
            'latestBerita' => $this->latestBerita,
            'campaigns' => $this->campaigns,
        ])->layout('layouts.mobile');
    }
}
