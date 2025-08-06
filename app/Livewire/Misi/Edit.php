<?php

namespace App\Livewire\Misi;

use Livewire\Component;
use App\Models\misi;

class Edit extends Component
{
    public string $misi = "";
    public $id_misi;

    public function mount(){
        $misis = misi::find($this->id_misi);
        $this->misi = $misis->misi;

    }
    protected function rules()
    {
        return [
            'misi' => 'required|string',
        ];
    }

    public function clear($id_misi)
    {
        $this->dispatch('refreshComponent');
        $misi = misi::find($id_misi);
        if ($misi) {
            $this->id_misi = $misi->id_misi;
            $this->misi = $misi->misi;

        }
    }

    public function edit()
    {
        $validatedData = $this->validate();


        $misi = misi::find($this->id_misi);
        $misi->update([
            'misi' => $validatedData['misi'],
        ]);
        misi::reorder();

        $this->clear($this->id_misi);

        $this->dispatch('misiUpdated');

    }
    public function render()
    {
        return view('livewire.misi.edit');
    }
}
