<?php

namespace App\Livewire\LaporanAdmin;

use App\Models\laporan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $file; // Pastikan ini bukan string
    public $nama;

    protected function rules()
    {
        return [
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048',
            'nama' => 'required|string|max:255',
        ];
    }

    public function save()
    {
        // Validasi data
        $this->validate();

        // Simpan file file dan ambil path-nya
        $path = $this->file->storeAs('file/laporan', $this->nama, 'public'); // Simpan di storage/public
        // dd($path);

        // Ambil ekstensi file
        $extension = $this->file->getClientOriginalExtension();

        // Gabungkan nama dengan ekstensi file
        $namaFile = $this->nama . '.' . $extension;

        // Simpan data ke databasex`
        $laporan = laporan::create([
            'file' => $path, // Simpan path file
            'nama' => $namaFile, // Nama dengan ekstensi
        ]);

        // Reset input setelah disimpan
        $this->reset();

        // Emit event bahwa file berhasil dibuat
        $this->dispatch('fileCreated');

        return $laporan;
    }

    public function render()
    {
        return view('livewire.laporan-admin.create');
    }
}
