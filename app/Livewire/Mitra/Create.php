<?php

namespace App\Livewire\Mitra;

use Livewire\Component;
use App\Models\Mitra;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public string $partner_name = "";
    public $logo; // Pastikan ini bukan string

    protected function rules()
    {
        return [
            'partner_name' => 'required|string',
            'logo' => 'required|image|max:1024', // Validasi gambar
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan file gambar dan ambil path-nya
        $path = $this->logo->store('images/mitra', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $mitra = Mitra::create([
            'partner_name' => $validatedData['partner_name'],
            'logo' => $path, // Simpan path gambar
        ]);

        $this->reset();

        $this->dispatch('mitraCreated');

        return $mitra;

    }

    public function render()
    {
        return view('livewire.mitra.create');
    }
}
