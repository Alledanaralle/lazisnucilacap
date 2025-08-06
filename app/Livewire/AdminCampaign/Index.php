<?php

namespace App\Livewire\AdminCampaign;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Campaign;
use App\Models\Kategori;



class Index extends Component
{
    public $kategoriList = [];

    #[On('postUpdated')]
    public function handlePostEdited()
    {
        // session()->flash('message', 'Campaign Updated Successfully ');
        $this->dispatch('updated', ['message' => 'Campaign Edited Successfully']);


    }


    #[On('campaignCreated')]
    public function handleCampaignCreated()
    {
        // session()->flash('message', 'Campaign Created Successfully ');
        $this->dispatch('created', ['message' => 'Campaign Created Successfully']);


    }
    public function destroy($id_campaign)
    {
        $campaign = campaign::find($id_campaign);
        if ($campaign) {
            $campaign->delete();
            $this->dispatch('destroyed', ['message' => 'Campaign deleted Successfully']);

        }
        // session()->flash('message', 'Campaign Destroyed Successfully ');


    }





    public function render()
    {


        return view('livewire.admincampaign.index', [
            $this->campaigns = Campaign::query()
                ->latest()
                ->paginate(10),
            'campaigns' => $this->campaigns
        ])->layout('layouts.admin');
    }
}
