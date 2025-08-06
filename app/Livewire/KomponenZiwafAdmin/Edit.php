<?php

namespace App\Livewire\KomponenZiwafAdmin;

use App\Models\Komponen_Ziwaf;
use Livewire\Component;

class Edit extends Component
{
    public $KomZiwaf;
    public $harga_emas;
    public $nisab;
    public $nisab_kg;
    public $fidyah;


    public function rules()
    {
        return [
            'harga_emas' => 'required|numeric',
            'nisab' => 'required|numeric',
            'nisab_kg' => 'required|numeric',
            'fidyah' => 'required|numeric',
        ];
    }

    public function mount()
    {
        $kompZiwaf = Komponen_Ziwaf::find($this->id);
        $this->$kompZiwaf = $kompZiwaf;
        $this->harga_emas = $kompZiwaf->harga_emas;
        $this->nisab = $kompZiwaf->nisab;
        $this->nisab_kg = $kompZiwaf->nisab_kg;
        $this->fidyah = $kompZiwaf->fidyah;
    }

    public function update()
    {
        $this->validate();

        $kompZiwaf = Komponen_Ziwaf::find($this->id);

        $kompZiwaf->update([
            'harga_emas' => $this->harga_emas,
            'nisab' => $this->nisab,
            'nisab_kg' => $this->nisab_kg,
            'fidyah' => $this->fidyah,
        ]);
    }

    public function render()
    {
        return view('livewire.komponen-ziwaf-admin.edit');
    }
}
