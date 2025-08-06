<?php

namespace App\Livewire\Petugas;

use Livewire\Component;
use App\Models\petugas;

class Create extends Component
{
    public string $nama ="";
    public string $no;
    public string $bagian = "";

    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'bagian' => 'required|string|unique:petugas,bagian',
            'no' => 'required|string|regex:/^62[0-9]{9,}$/',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute sudah ada',
            'no.regex' => 'Nomor telepon harus dimulai dengan 62 dan hanya mengandung angka.',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();


        // Simpan data ke database
        $petugases = petugas::create([
            'nama' => $validatedData['nama'],
            'no' => $validatedData['no'],
            'bagian' => $validatedData['bagian'],
        ]);

        $this->reset();

        $this->dispatch('petugasCreated');

        return $petugases;

    }

    public function render()
    {
        return view('livewire.petugas.create');
    }
}
