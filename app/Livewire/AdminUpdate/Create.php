<?php

namespace App\Livewire\AdminUpdate;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use App\Models\update_campaign;
use Illuminate\Support\Str;
use App\Models\Campaign;

class Create extends Component
{
    use WithFileUploads;
    #[Rule('required|string')]
    public $description;

    #[Rule('required|integer')]
    public $id_campaign;

    #[Rule('required|image')]
    public $picture;
    public $campaigns= [];

    public function mount()
    {
        $this->campaigns = Campaign::all();
    }

    public function save()
    {
        $this->validate();

        $PicturePath = $this->uploadImage($this->picture);

        $update_campaign = update_campaign::create([
            'description' => $this->description,
            'id_campaign' => $this->id_campaign,
            'picture' => $PicturePath,

        ]);
        
        $this->reset();
        session()->flash('message', 'Update Campaign Created successfully.');
        $this->dispatch('updateCampaignCreated');
        return $update_campaign;

    }
    protected function uploadImage($image)
    {
        if ($image) {
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/update_campaign', $filename);
            return basename($filename);
        }
        return null;
    }
   
    public function render()
    {
        return view('livewire.admin-update.create');
    }
}
