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
            $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Update Campaign updated Successfully']);
        // session()->flash('message', 'Update Campaign Updated Successfully ');

    }
    #[On('updateCampaignCreated')]
    public function handleCampaignCreated()
    {
            $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Update Campaign created Successfully']);
        // session()->flash('message', 'Update Campaign Created Successfully ');
        
    }
    public function destroy($id_update_campaign)
    {
        $update_campaign = update_campaign::find($id_update_campaign);
        if ($update_campaign) {
            $update_campaign->delete();
            session()->flash('swal', ['type' => 'success', 'title' => 'Success', 'text' => 'Update Campaign deleted Successfully.']);
            return redirect()->to(url()->previous());
            
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
