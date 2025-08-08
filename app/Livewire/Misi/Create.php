<?php

namespace App\Livewire\Misi;

use App\Models\misi;
use Livewire\Component;

class Create extends Component
{
    public string $misi = "";

    protected function rules()
    {
        return [
            'misi' => 'required|string',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();


        // Simpan data ke database
        $Misi = misi::create([
            'misi' => $validatedData['misi'],
            'order' => misi::max('order') + 1,
        ]);
        misi::reorder();

        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Misi Created successfully.',
        ]);
        return redirect()->to(url()->previous());

        

    }
    public function render()
    {
        return view('livewire.misi.create');
    }
}
