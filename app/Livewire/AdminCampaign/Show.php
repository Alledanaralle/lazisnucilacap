<?php

namespace App\Livewire\AdminCampaign;

use Livewire\Component;
use App\Models\Campaign;


class Show extends Component
{
    public $id_campaign;
    public $campaign;

    public function mount($id_campaign)
    {
        $this->id_campaign = $id_campaign;
        $this->campaign = Campaign::find($id_campaign);
        // dd($this->campaign);

        $this->processDescription();
    }

    public function processDescription()
    {
        $desc = $this->campaign->description;

        $desc = str_replace('[img1]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->main_picture) . '" class="article-image" style="width: 200px; height: auto;" /> <p>', $desc);
        $desc = str_replace('[img2]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->second_picture) . '" class="article-image" style="width: 200px; height: auto;" /> <p>', $desc);
        $desc = str_replace('[img3]', '</p> <img src="' . asset('storage/images/campaign/' . $this->campaign->last_picture) . '" class="article-image" style="width: 200px; height: auto;" /> <p>', $desc);

        $this->processedDesc = $desc;
    }
    public function render()
    {
        return view('livewire.admincampaign.show',[
            'processedDesc' => $this->processedDesc,
        ]);
    }
}
