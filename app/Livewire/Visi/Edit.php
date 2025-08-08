<?php

namespace App\Livewire\Visi;

use Livewire\Component;
use App\Models\visi;

class Edit extends Component
{
    public string $visi = "";
    public $id_visi;


    public function mount(){
        $visis = visi::find($this->id_visi);
        $this->visi = $visis->visi;

    }
    protected function rules()
    {
        return [
            'visi' => 'required|string',
        ];
    }

    public function edit()
    {
        // Validasi data
        $validatedData = $this->validate();

        $visi = visi::find($this->id_visi);
        $visi->update([
            'visi' => $validatedData['visi'],
        ]);

        visi::reorder();

        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Visi updated successfully.',
        ]);
        return redirect()->to(url()->previous());

        

    }
    public function render()
    {
        return view('livewire.visi.edit');
    }
}
