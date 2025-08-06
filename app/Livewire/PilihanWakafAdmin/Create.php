<?php

namespace App\Livewire\PilihanWakafAdmin;

use Livewire\Component;

use App\Models\pilihan_wakaf;

class Create extends Component
{
    public $pil_wakaf;

    protected function rules()
    {
        return [
            'pil_wakaf' => 'required|string',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan data ke database
        $pilihan_wakaf = pilihan_wakaf::create([
            'pil_wakaf' => $validatedData['pil_wakaf'],
        ]);

        $this->reset();

        $this->dispatch('pilihan_wakafCreated');

        return $pilihan_wakaf;
    }

    public function render()
    {
        return view('livewire.pilihan-wakaf-admin.create');
    }
}
