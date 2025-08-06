<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Doa;
use App\Models\Campaign;
class DoaList extends Component
{
    public Campaign $campaign;
    public $doa;

    public function mount($title){
        $decodedTitle = urldecode($title);

        $this->campaign = Campaign::where('title', $decodedTitle)->firstOrFail();

        
    }
    public function loadDoas()
    {
        $this->doa = Doa::where('id_campaign', $this->campaign->id_campaign)
        ->whereHas('transaction', function ($query) {
            $query->where('status', 'success');
        })
        ->get();
    }
    public function render()
    {
        return view('livewire.campaigns.doa-list',[
            'doas' => $this->doa,

        ])->layout('layouts.none');
    }
}
