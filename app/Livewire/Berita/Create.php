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
    public string $slug = "";

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
            'slug' => 'required|string|unique:berita,slug',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan file gambar dan ambil path-nya
        $path = $this->picture->store('images/berita', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $berita = Berita::create([
            'title_berita' => $validatedData['title_berita'],
            'description' => $validatedData['description'],
            'tanggal' => $validatedData['tanggal'],
            'id_kategori' => $validatedData['id_kategori'],
            'picture' => $path, // Simpan path gambar
            'slug' => $validatedData['slug'],
        ]);

        session()->flash('message', 'Berita Created successfully.');
        return redirect()->to(url()->previous());

    }

    public function render()
    {
        return view('livewire.berita.create');
    }
}
