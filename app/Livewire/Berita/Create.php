<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use App\Models\Berita;
use Livewire\WithFileUploads;
use App\Models\Kategori;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    public $kategoriList = [];

    public string $title_berita = "";
    public string $description = "";
    public string $tanggal = "";
    public string $id_kategori;
    public $picture; // Pastikan ini bukan string

    public function mount()
    {
        $this->kategoriList = Kategori::all();

    }
    protected function rules()
    {
        return [
            'title_berita' => 'required|string',
            'description' => 'required|string',
            'tanggal' => 'required|date',
            'id_kategori' => 'required|string',
            'picture' => 'required|image|max:1024', // Validasi gambar
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // $slug = Str::slug($validatedData['title_berita']);

        // Simpan file gambar dan ambil path-nya
        $path = $this->picture->store('images/berita', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $berita = Berita::create([
            'title_berita' => $slug,
            'description' => $validatedData['description'],
            'tanggal' => $validatedData['tanggal'],
            'id_kategori' => $validatedData['id_kategori'],
            'picture' => $path, // Simpan path gambar
        ]);

        $this->reset();

        $this->dispatch('beritaCreated');

        return $berita;

    }

    public function render()
    {
        return view('livewire.berita.create');
    }
}
