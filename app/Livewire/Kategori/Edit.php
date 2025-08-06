<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    public $image;
    public $nama_kategori;
    public $id;
    public $kategori;


    protected function rules()
    {
        return [
            'image' => 'nullable|image',
            'nama_kategori' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $kategori = kategori::find($this->id);
        $this->kategori = $kategori;
        $this->nama_kategori = $kategori->nama_kategori;
    }

    public function update()
    {
        $this->validate();


        if ($this->image) {
            if ($this->kategori->image) {
                Storage::disk('public')->delete($this->kategori->image);
            }


            $path = $this->image->store('images/kategori', 'public');

            $this->kategori->kategori = $path;
        }

        $this->kategori->nama_kategori = $this->nama_kategori;

        $this->kategori->save();


        $this->dispatch('kategoriUpdated');

        return $this->kategori;
    }
    public function render()
    {
        return view('livewire.kategori.edit');
    }
}
