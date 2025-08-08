<?php

namespace App\Livewire\Visi;

use App\Models\visi;
use Livewire\Component;

class Create extends Component
{
    public string $visi = "";

    protected function rules()
    {
        return [
            'visi' => 'required|string',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();


        // Simpan data ke database
        $Visi = visi::create([
            'visi' => $validatedData['visi'],
            'order' => visi::max('order') + 1,
        ]);

        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Visi Created successfully.',
        ]);
        return redirect()->to(url()->previous());

        

    }
    public function render()
    {
        return view('livewire.visi.create');
    }
}
