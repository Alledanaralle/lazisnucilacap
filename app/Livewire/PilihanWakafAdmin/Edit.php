<?php

namespace App\Livewire\PilihanWakafAdmin;

use Livewire\Component;
use App\Models\pilihan_wakaf;

class Edit extends Component
{
    public $id;
    public $pil_wakaf;

    public function rule()
    {
        return [
            'pil_wakaf' => 'required|string',
        ];
    }

    public function clear($id)
    {
        $this->reset();
        $this->dispatch('refreshComponent');
        $pilihan_wakaf = pilihan_wakaf::find($id);
        if ($pilihan_wakaf) {
            $this->id = $pilihan_wakaf->id;
            $this->pil_wakaf = $pilihan_wakaf->pil_wakaf;
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
                <span class="placeholder col-6"></span>
                <span class="placeholder col-8"></span>
            </p>
        </div>
        BLADE;
    }
    public function mount($id)
    {
        $pilihan_wakaf = pilihan_wakaf::find($id);
        if ($pilihan_wakaf) {
            $this->id = $pilihan_wakaf->id;
            $this->pil_wakaf = $pilihan_wakaf->pil_wakaf;
        }
        return $pilihan_wakaf;
    }
    public function update()
    {

        $validatedData = $this->validate([
            'pil_wakaf' => 'required|string',
        ]);

        $pilihan_wakaf = pilihan_wakaf::find($this->id);
        if ($pilihan_wakaf) {
            // Update data pilihan_wakaf lainnya
            $pilihan_wakaf->update([
                'pil_wakaf' => $validatedData['pil_wakaf'],
            ]);
        }

        // Reset form dan dispatch event
        $this->dispatch('pilihan_wakafUpdated');
        return $pilihan_wakaf;
    }

    public function render()
    {
        return view('livewire.pilihan-wakaf-admin.edit');
    }
}
