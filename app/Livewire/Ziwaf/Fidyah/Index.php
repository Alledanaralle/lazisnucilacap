<?php

namespace App\Livewire\Ziwaf\Fidyah;

use App\Models\Komponen_Ziwaf;
use Livewire\Component;

class Index extends Component
{
    public $nominal;
    public $nominal_fidyah = 0;
    public $atasNama;
    public $data;
    public $fidyah_perhari;

    public function rules(){
        return [ 
            'nominal' => 'required|numeric',
            'atasNama' => 'required',
        ];
    }

    public function messages(){
        return [
            'nominal.required' => 'Hari harus diisi.',
            'nominal.numeric' => 'Hari harus berupa angka.',
            'atasNama.required' => 'Atas Nama harus diisi.',
        ];
    }

    public function mount()
    {
        $kompZiwaf = Komponen_Ziwaf::find(1);
        $this->fidyah_perhari = $kompZiwaf->fidyah;
    }
    public function updatedNominal(){
        if($this->nominal == null){
            $this->nominal_fidyah = 0;
        }else{
            $this->nominal_fidyah = $this->nominal * $this->fidyah_perhari ?? 0;
        }
    }

    public function bayarFidyah(){

        $this->validate();
        $this->data = [
            'nominal' => $this->nominal_fidyah,
            'hari' => $this->nominal,
            'atasNama' => $this->atasNama,
        ];
        return redirect()->route('fidyah.data')->with('data', $this->data);
    }
    public function render()
    {
        return view('livewire.ziwaf.fidyah.index')->layout('layouts.mobile');
    }
}
