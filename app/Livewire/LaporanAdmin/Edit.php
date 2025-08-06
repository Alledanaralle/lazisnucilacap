<?php

namespace App\Livewire\LaporanAdmin;

use Livewire\Component;
use App\Models\laporan;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    public $file;
    public $nama;
    public $laporan;
    public $id;


    protected function rules()
    {
        return [
            'file' => 'nullable|image',
            'nama' => 'required|string',
        ];
    }


    public function mount()
    {
        $laporan = laporan::find($this->id);
        $this->laporan = $laporan;
        // $this->nama = $laporan->nama;
    }

    public function update()
    {
        $this->validate();

        // Check if a new image is being uploaded
        if ($this->file) {
            // Delete the old image if it exists
            if ($this->laporan->file) {
                Storage::disk('public')->delete($this->laporan->file);
            }

            // Store the new image
            $path = $this->file->store('file/laporan', 'public');
            $this->laporan->file = $path;
        }

        // Update the nama
        $this->laporan->nama = $this->nama;

        // Save the changes
        $this->laporan->save();

        // Reset the form inputs

        // Dispatch the event for the updated image
        $this->dispatch('fileUpdated');

        return $this->laporan;
    }

    public function render()
    {
        return view('livewire.laporan-admin.edit');
    }
}
