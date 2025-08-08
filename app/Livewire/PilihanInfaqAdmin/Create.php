<?php

namespace App\Livewire\PilihanInfaqAdmin;

use Livewire\Component;

use App\Models\pilihan_infaq;

class Create extends Component
{
    public $pil_infaq;

    protected function rules()
    {
        return [
            'pil_infaq' => 'required|string',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan data ke database
        $pilihan_infaq = pilihan_infaq::create([
            'pil_infaq' => $validatedData['pil_infaq'],
        ]);

        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Pilihan Infaq Created successfully.',
        ]);
        return redirect()->to(url()->previous());

        
    }

    public function render()
    {
        return view('livewire.pilihan-infaq-admin.create');
    }
}
