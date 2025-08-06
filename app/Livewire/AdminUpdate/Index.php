<?php

namespace App\Livewire\AdminUpdate;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\update_campaign;

class Index extends Component
{
    
    #[On('updateCampaignUpdated')]
    public function handlePostEdited()
    {
            $this->dispatch('updated', ['message' => 'Update Campaign updated Successfully']);
        // session()->flash('message', 'Update Campaign Updated Successfully ');

    }
    #[On('updateCampaignCreated')]
    public function handleCampaignCreated()
    {
            $this->dispatch('created', ['message' => 'Update Campaign created Successfully']);
        // session()->flash('message', 'Update Campaign Created Successfully ');
        
    }
    public function destroy($id_update_campaign)
    {
        $update_campaign = update_campaign::find($id_update_campaign);
        if ($update_campaign) {
            $update_campaign->delete();
            $this->dispatch('destroyed', ['message' => 'Update Campaign deleted Successfully']);
        }
        // session()->flash('message', 'Update Campaign Destroyed Successfully ');


    }



    public function render()
    {
        return view('livewire.admin-update.index',[
            $this->update_campaigns = update_campaign::query()
                ->latest()
                ->paginate(10),
            'update_campaigns' => $this->update_campaigns
        ])->layout('layouts.admin');
    }
}
