<?php

namespace App\Livewire\Petugas;

use Livewire\Component;
use App\Models\petugas;


class Edit extends Component
{
    public string $nama = "";
    public string $no;
    public string $bagian = "";
    public $petugas;
    public $id_petugas;



    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'bagian' => 'required|string',
            'no' => 'required|string',
            'id_petugas' => 'required|integer',
        ];
    }

    public function mount()
    {
        $this->petugas = petugas::find($this->id_petugas);
        $this->nama = $this->petugas->nama;
        $this->no = $this->petugas->no;
        $this->bagian = $this->petugas->bagian;
    }

    public function update()
    {
        // $this->validate();

        // $this->petugas->nama = $this->nama;
        // $this->petugas->no = $this->no;
        // $this->petugas->bagian = $this->bagian;

        // // Save the changes
        // $this->petugas->save();

        $validatedData = $this->validate();

        $petugas = petugas::find($this->id_petugas);
        $petugas->update([
            'nama' => $validatedData['nama'],
            'no' => $validatedData['no'],
            'bagian' => $validatedData['bagian'],
        ]);

        // Reset the form inputs
        // dd($validatedData);
        // Dispatch the event for the updated image
        $this->dispatch('petugasUpdated');

        return $this->petugas;
    }

    public function render()
    {
        return view('livewire.petugas.edit');
    }
}
