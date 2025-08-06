<?php

namespace App\Livewire\Mitra;

use App\Models\Mitra;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public string $id_partner = "";
    public string $partner_name = "";
    public $logo; // Make sure this is not a string

    protected function rules()
    {
        return [
            'partner_name' => 'required|string',
            'logo' => 'nullable|image|max:1024', // Validate image
        ];
    }

    public function clear($id_partner)
    {
        $this->dispatch('refreshComponent');
        $mitra = Mitra::find($id_partner);
        if ($mitra) {
            $this->id_partner = $mitra->id_partner;
            $this->partner_name = $mitra->partner_name;
            // $this->logo = $mitra->logo; // Fetch the current logo
        }
    }

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function placeholder()
    {
        return <<<'BLADE'
        <div>
            <h5 class="card-title placeholder-glow">
                <span class="placeholder col-4"></span>
            </h5>
            <p class="card-text placeholder-glow">
                <span class="placeholder col-7"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-4"></span>
            </p>
        </div>
        BLADE;
    }

    public function mount($id_partner)
    {
        $mitra = Mitra::find($id_partner);
        if ($mitra) {
            $this->id_partner = $mitra->id_partner;
            $this->partner_name = $mitra->partner_name;
            // $this->logo = $mitra->logo; // Fetch the current logo
        }
    }

    public function update()
    {
        $validatedData = $this->validate();

        $mitra = Mitra::find($this->id_partner);
        if ($mitra) {
            // If a new image is uploaded
            if ($this->logo) {
                // Delete the old image if exists
                if ($mitra->logo) {
                    Storage::disk('public')->delete($mitra->logo);
                }
                // Upload the new image and save its path
                $path = $this->logo->store('images/mitra', 'public');
                $mitra->logo = $path;
            }

            // Update other details
            $mitra->update([
                'partner_name' => $validatedData['partner_name'],
                // The 'logo' field is updated above if a new image is uploaded
            ]);
        }

        // Reset form and dispatch event
        $this->clear($this->id_partner);
        $this->dispatch('mitraUpdated');
    }

    public function render()
    {
        return view('livewire.mitra.edit');
    }
}
