<?php

namespace App\Livewire\AdminUpdate;

use Livewire\Component;
use App\Models\update_campaign;

class Show extends Component
{
    public $id_update_campaign;
    public $update_campaign;

    public function mount($id_update_campaign)
    {
        $this->id_update_campaign = $id_update_campaign;
        $this->update_campaign = update_campaign::find($id_update_campaign);
        $this->processDescription();
    }

    public function processDescription()
    {
        $desc = $this->update_campaign->description;

        $desc = str_replace('[img1]', '</p> <img src="' . asset('storage/images/update_campaign/' . $this->update_campaign->picture) . '" class="article-image" style="width: 200px; height: auto;" /> <p>', $desc);
        $this->processedDesc = $desc;
    }
    
    
    public function render()
    {
        return view('livewire.admin-update.show',[
            'processedDesc' => $this->processedDesc,

        ]);
    }
}
