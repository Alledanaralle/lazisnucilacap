<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;

    public $image; 
    public $nama_kategori;

    protected function rules()
    {
        return [
            'image' => 'required|image',
            'nama_kategori' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();
    
        $path = $this->image->store('images/kategori', 'public');
    
        $filename = basename($path);
    
        $kategori = Kategori::create([
            'image' => $filename,
            'nama_kategori' => $this->nama_kategori,
        ]);
    
        $this->reset();
    
        $this->dispatch('kategoriCreated');
    
        return $kategori;
    }
    
    public function render()
    {
        return view('livewire.kategori.create');
    }
}
