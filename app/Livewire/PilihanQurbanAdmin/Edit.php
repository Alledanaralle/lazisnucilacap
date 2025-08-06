<?php

namespace App\Livewire\PilihanQurbanAdmin;

use Livewire\Component;
use App\Models\pilihan_qurban;

class Edit extends Component
{
    public $id;
    public $nama;
    public $harga;
    public $harga2;

    public function convert()
    {
        $harga = !empty($this->harga) ? (float) str_replace('.', '', $this->harga) : 0;
        $this->harga2 = $harga;
        $this->update();

    }

    public function rule()
    {
        return [
            'nama' => 'required|string',
            'harga2' => 'required|integer',
        ];
    }

    public function clear($id)
    {
        $this->dispatch('refreshComponent');
        $pilihan_qurban = pilihan_qurban::find($id);
        if ($pilihan_qurban) {
            $this->id = $pilihan_qurban->id;
            $this->nama = $pilihan_qurban->nama;
            $this->harga = $pilihan_qurban->harga;
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
        $pilihan_qurban = pilihan_qurban::find($id);
        if ($pilihan_qurban) {
            $this->id = $pilihan_qurban->id;
            $this->nama = $pilihan_qurban->nama;
            $this->harga = $pilihan_qurban ? number_format($pilihan_qurban->harga, 0, ',', '.') : 0;
        }
        return $pilihan_qurban;
    }
    public function update()
    {

        $validatedData = $this->validate([
            'nama' => 'required|string',
            'harga2' => 'required|integer',
        ]);

        $pilihan_qurban = pilihan_qurban::find($this->id);
        if ($pilihan_qurban) {
            // Update data pilihan_qurban lainnya
            $pilihan_qurban->update([
                'nama' => $validatedData['nama'],
                'harga' => $validatedData['harga2'],
            ]);
        }

        // Reset form dan dispatch event
        $this->clear($this->id());
        $this->dispatch('pilihan_qurbanUpdated');
        return $pilihan_qurban;
    }

    public function render()
    {
        return view('livewire.pilihan-qurban-admin.edit');
    }
}
