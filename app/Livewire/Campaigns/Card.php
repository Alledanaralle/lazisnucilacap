<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Campaign;
use Carbon\Carbon;

class Card extends Component
{
    public Campaign $campaign;

    public function mount()
    {
        $this->campaign = Campaign::find($this->campaign->id_campaign);
        // dd($this->campaign);
        $this->processProgress();
        $this->dayLeft();
    }
    public function processProgress()
    {

        $raised = $this->campaign->raised;
        $goal = $this->campaign->goal;
        $progress = $raised / $goal * 100;
        if ($progress > 100) {
            $progress = 100;
        }
        $this->progress = $progress;
    }
    public function dayLeft()
    {
        $end_date = Carbon::parse($this->campaign->end_date);
        $dayLeft = floor($end_date->diffInDays(Carbon::now(), false));
                if ($dayLeft< 0) {
            $dayLeft = -$dayLeft;
        }else if ($dayLeft> 0) {
            $dayLeft = 0;
        }
        
        $this->dayLeft = $dayLeft;
    }
    public function render()
    {
        return view('livewire.campaigns.card', [
            'progress' => $this->progress,
            'dayLeft' => $this->dayLeft,

        ])->layout('layouts.mobile');
    }
}
