<?php

namespace App\Livewire\AdminUpdate;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\update_campaign;
use Illuminate\Support\Str;
use App\Models\Campaign;


class Edit extends Component
{
    use WithFileUploads;
    public $id_update_campaign;
    #[Rule('required|string')]
    public $description;

    #[Rule('required|integer')]
    public $id_campaign;

    #[Rule('nullable|image')]
    public $picture;
    public $campaigns= [];


    public function mount(update_campaign $update_campaign)
    {
        $this->id_update_campaign = $update_campaign->id_update_campaign;
        $this->id_campaign = $update_campaign->id_campaign;
        $this->description = $update_campaign->description;
        $this->campaigns = Campaign::all();



    }
    

    public function update()
    {
        $this->validate();

        $update_campaign = update_campaign::find($this->id_update_campaign);
        $update_campaign->description = $this->description;
        $update_campaign->id_campaign = $this->id_campaign;

        if ($this->picture) {
            if ($update_campaign->picture) {
                \Storage::disk('public')->delete('images/update_campaign/' . $update_campaign->picture);
            }
            $update_campaign->picture = $this->uploadImage($this->picture);
        }

        $update_campaign->save();
        session()->flash('message', 'Campaign updated successfully.');
        $this->clear($this->id_update_campaign);
        $this->reset();
        $this->dispatch('updateCampaignUpdated');
        return $update_campaign;
    }

    protected function uploadImage($image)
    {
        $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/update_campaign', $filename);

        return $filename;

    }
    public function clear($id_update_campaign)
    {
        $this->reset();
        $this->dispatch('refreshComponent');
        $update_campaign = update_campaign::find($id_update_campaign);
        if ($update_campaign) {
            $this->id_update_campaign = $update_campaign->id_update_campaign;
            $this->id_campaign = $update_campaign->id_campaign;
            $this->description = $update_campaign->description;
        }

    }
    public function render()
    {
        return view('livewire.admin-update.edit');
    }
}
