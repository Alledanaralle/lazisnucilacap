<?php

namespace App\Livewire\GambarLanding;

use Livewire\Component;
use App\Models\gambar_landing;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    public $gambar;
    public $link;
    public $landing;  
    public $id_gambar;  


    protected function rules()
    {
        return [
            'gambar' => 'nullable|image',
            'link' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $landing = gambar_landing::find($this->id_gambar);
        $this->landing = $landing;
        $this->link = $landing->link;
    }

    public function update()
    {
        $this->validate();

        // Check if a new image is being uploaded
        if ($this->gambar) {
            // Delete the old image if it exists
            if ($this->landing->gambar) {
                Storage::disk('public')->delete($this->landing->gambar);
            }

            // Store the new image
            $path = $this->gambar->store('images/gambar_landing', 'public');
            $this->landing->gambar = $path;
        }

        // Update the link
        $this->landing->link = $this->link;

        // Save the changes
        $this->landing->save();

        // Reset the form inputs

        // Dispatch the event for the updated image
        $this->dispatch('gambarUpdated');

        return $this->landing;
    }

    public function render()
    {
        return view('livewire.gambar-landing.edit');
    }
}
