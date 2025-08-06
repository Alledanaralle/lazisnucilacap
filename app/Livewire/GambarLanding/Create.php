<?php

namespace App\Livewire\GambarLanding;

use App\Models\gambar_landing;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $gambar; // Pastikan ini bukan string
    public $link;

    protected function rules()
    {
        return [
            'gambar' => 'required|image',
            'link' => 'nullable|string',
        ];
    }

    public function save()
    {
        // Validasi data
       $this->validate();

        // Simpan file gambar dan ambil path-nya
        $path = $this->gambar->store('images/gambar_landing', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $landing = gambar_landing::create([
            'position' => gambar_landing::max('position') + 1,
            'gambar' => $path, // Simpan path gambar
            'link' => $this->link, 
        ]);

        $this->reset();

        $this->dispatch('gambarCreated');

        return $landing;

    }

    public function render()
    {
        return view('livewire.gambar-landing.create');
    }
}
