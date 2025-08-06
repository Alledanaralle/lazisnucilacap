<?php

namespace App\Livewire\PilihanInfaqAdmin;

use Livewire\Component;
use App\Models\pilihan_infaq;

class Edit extends Component
{
    public $id;
    public $pil_infaq;

    public function rule()
    {
        return [
            'pil_infaq' => 'required|string',
        ];
    }

    public function clear($id)
    {
        $this->reset();
        $this->dispatch('refreshComponent');
        $pilihan_infaq = pilihan_infaq::find($id);
        if ($pilihan_infaq) {
            $this->id = $pilihan_infaq->id;
            $this->pil_infaq = $pilihan_infaq->pil_infaq;
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
        $pilihan_infaq = pilihan_infaq::find($id);
        if ($pilihan_infaq) {
            $this->id = $pilihan_infaq->id;
            $this->pil_infaq = $pilihan_infaq->pil_infaq;
        }
        return $pilihan_infaq;
    }
    public function update()
    {

        $validatedData = $this->validate([
            'pil_infaq' => 'required|string',
        ]);

        $pilihan_infaq = pilihan_infaq::find($this->id);
        if ($pilihan_infaq) {
            // Update data pilihan_infaq lainnya
            $pilihan_infaq->update([
                'pil_infaq' => $validatedData['pil_infaq'],
            ]);
        }

        // Reset form dan dispatch event
        $this->dispatch('pilihan_infaqUpdated');
        return $pilihan_infaq;
    }

    public function render()
    {
        return view('livewire.pilihan-infaq-admin.edit');
    }
}
