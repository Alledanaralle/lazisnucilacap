<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\Campaign;

class DonasiList extends Component
{
    public Campaign $campaign;
    public $donasis;

    public function mount($title)
    {
        $decodedTitle = urldecode($title);

        $this->campaign = Campaign::where('title', $decodedTitle)->firstOrFail();

        
    }
    public function loadDonasis()
    {
        $this->donasis = Donasi::where('id_campaign', $this->campaign->id_campaign)
            ->whereHas('transaction', function ($query) {
                $query->where('status', 'success');
            })
            ->get();
            
    }
    public function render()
    {
        return view('livewire.campaigns.donasi-list',[
            'donasis' => $this->donasis,

        ])->layout('layouts.none');
    }
}
