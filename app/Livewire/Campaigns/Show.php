<?php
namespace App\Livewire\Campaigns;

use App\Models\Campaign;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Donasi;
use App\Models\Doa;
use App\Models\update_campaign;

class Show extends Component
{
    public Campaign $campaign;
    public $processedUpdate = null;
    public $processedDesc;
    public $donasis = null;
    public $doa = null;
    public $update_campaign;
    public $progress;
    public $dayLeft;
    public $title;
    public $slug;


    public function mount($slug)
    {
        Campaign::updateRaisedValues();
        $this->slug = $slug;
        $this->loadCampaign();
        
    }

    public function loadDonasis()
    {
        $this->donasis = Donasi::where('id_campaign', $this->campaign->id_campaign)
            ->whereHas('transaction', function ($query) {
                $query->where('status', 'success');
            })
            ->take(3)
            ->get();
            
    }

    public function loadDoas()
    {
        $this->doa = Doa::where('id_campaign', $this->campaign->id_campaign)
            ->whereHas('transaction', function ($query) {
                $query->where('status', 'success');
            })
            ->take(3)
            ->get();
    }
    
    public function loadCampaign()
    {
        $this->campaign = Campaign::where('slug', urldecode($this->slug))->firstOrFail();
        $this->update_campaign = update_campaign::where('id_campaign', $this->campaign->id_campaign)->latest('updated_at')->first();

        $this->processDescription();
        if ($this->update_campaign) {
            $this->processUpdate();
        }
        $this->processProgress();
        $this->dayLeft();
    }
    public function processDescription()
    {
        $desc = $this->campaign->description;
    
        // Replace the image placeholders
        $desc = str_replace('[img1]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->main_picture) . '"/>  <p style="font-size:12px;x">', $desc);
        $desc = str_replace('[img2]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->second_picture) . '"/>  <p style="font-size:12px;x">', $desc);
        $desc = str_replace('[img3]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->last_picture) . '"/>  <p style="font-size:12px;x">', $desc);
    
        // Replace newlines with <br> tags
        $desc = nl2br($desc);
    
        $this->processedDesc = $desc;
    }
    

    public function processUpdate()
    {
        $desc = $this->update_campaign->description;

        $desc = str_replace('[img1]', '</p> <img src="' . asset('storage/images/update_campaign/' . $this->update_campaign->picture) . '"/>  <p style="font-size:12px; margin-top:10px">', $desc);

        $desc = nl2br($desc);

        $this->processedUpdate = $desc;
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
        if ($dayLeft < 0) {
            $dayLeft = -$dayLeft;
        } else if ($dayLeft > 0) {
            $dayLeft = 0;
        }

        $this->dayLeft = $dayLeft;
    }

    public function render()
    {
        return view('livewire.campaigns.show', [
            'processedDesc' => $this->processedDesc,
            'processedUpdate' => $this->processedUpdate,
            'progress' => $this->progress,
            'dayLeft' => $this->dayLeft,
            'donasis' => $this->donasis,
            'doas' => $this->doa,
        ])->layout('layouts.none');
    }
}
