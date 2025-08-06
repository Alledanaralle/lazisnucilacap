<?php

namespace App\Livewire\KebijakanAdmin;

use App\Models\kebijakan;
use App\Models\kebijakanA;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $kebijakan; // Pastikan ini bukan string

    protected function rules()
    {
        return [
            'kebijakan' => 'required|image|max:1024', // Validasi kebijakan
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan file kebijakan dan ambil path-nya
        $path = $this->kebijakan->store('images/kebijakan', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $Kebijakan = kebijakan::create([
            'kebijakan' => $path, // Simpan path kebijakan
        ]);

        $this->reset();

        $this->dispatch('kebijakanCreated');

        return $Kebijakan;

    }

    public function render()
    {
        return view('livewire.kebijakan-admin.create');
    }
}
