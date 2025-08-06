<?php

namespace App\Livewire\Berita;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;

class FormEdit extends Component
{
    use WithFileUploads;
    public $kategoriList = [];

    
    public string $id_berita = "";
    public string $title_berita = "";
    public string $description = "";
    public string $tanggal = "";
    public string $id_kategori;
    public $picture; // Pastikan ini bukan string

    protected function rules()
    {
        return [
            'title_berita' => 'required|string',
            'description' => 'required|string',
            'tanggal' => 'required|date',
            'id_kategori' => 'required|string',
            'picture' => 'nullable|image|max:1024', // Validasi gambar
        ];
    }

    public function clear($id_berita)
    {
        $this->dispatch('refreshComponent');
        $berita = Berita::find($id_berita);
        if ($berita) {
            $this->id_berita = $berita->id_berita;
            $this->title_berita = $berita->title_berita;
            $this->tanggal = $berita->tanggal;
            $this->id_kategori = $berita->id_kategori;
            $this->picture = $berita->picture;
            $this->description = $berita->description;
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
    public function mount($id_berita)
    {
        $berita = berita::find($id_berita);
        if ($berita) {
            $this->id_berita = $berita->id_berita;
            $this->title_berita = $berita->title_berita;
            $this->tanggal = $berita->tanggal;
            $this->id_kategori = $berita->id_kategori;
            $this->description = $berita->description;
        }
        $this->kategoriList = Kategori::all();
        $kategori = Kategori::find($this->id_kategori);
        if ($kategori) {
            $this->nama_kategori = $kategori->nama_kategori;
        }
        return $berita;
    }
    public function update()
    {

        $validatedData = $this->validate([
            'title_berita' => 'required|string',
            'description' => 'required|string',
            'tanggal' => 'required|date',
            'id_kategori' => 'required|string',
            'picture' => 'nullable|image|max:1024', // Tidak wajib jika tidak ingin mengubah gambar
        ]);

        $berita = Berita::find($this->id_berita);
        if ($berita) {
            // Jika ada gambar baru yang diupload
            if ($this->picture) {
                // Hapus gambar lama jika ada
                if ($berita->picture) {
                    \Storage::disk('public')->delete($berita->picture);
                }
                // Unggah gambar baru dan simpan path-nya
                $path = $this->picture->store('images/berita', 'public');
                $berita->picture = $path;
            }

            // Update data berita lainnya
            $berita->update([
                'title_berita' => $validatedData['title_berita'],
                'tanggal' => $validatedData['tanggal'],
                'id_kategori' => $validatedData['id_kategori'],
                'description' => $validatedData['description'],
                'picture' => $berita->picture, // Update gambar baru jika ada
            ]);
        }

        // Reset form dan dispatch event
        $this->clear($this->id_berita);
        $this->dispatch('beritaUpdated');
        return $berita;
    }


    public function render()
    {
        return view('livewire.berita.form-edit');
    }
}
