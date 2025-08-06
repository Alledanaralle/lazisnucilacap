<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Kategori;

class Index extends Component
{
    public $kategori = "";
    public $filter = "Mendesak";
    public $search = '';
    public $campaigns = [];

    public function mount()
    {
        $this->kategori = session('kategori', 'Kategori');
        Campaign::updateRaisedValues();
    }

    public function saring($filter)
    {
        $this->filter = $filter;
        $this->loadCampaign();
    }

    public function updatedSearch()
    {
        $this->loadCampaign();
    }

    public function loadCampaign()
    {
        $query = Campaign::with('kategori')->where('end_date', '>', now());
    
        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }
    
        if ($this->kategori !== 'Kategori') {
            $kategori = Kategori::where('nama_kategori', $this->kategori)->first();
            
            if ($kategori) {
                $query->where('id_kategori', $kategori->id);
            }
        }
    
        if ($this->filter == 'Terbaru') {
            $query->latest();
        } elseif ($this->filter == 'Segera Berakhir') {
            $query->orderBy('end_date', 'asc');
        } elseif ($this->filter == 'Mendesak') {
            $query->orderByRaw("title LIKE '!%' DESC")
                  ->latest();
        }
    
        $this->campaigns = $query->get();
    }
    


    public function render()
    {
        return view('livewire.campaigns.index')->layout('layouts.mobile');
    }
}
