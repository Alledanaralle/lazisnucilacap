<?php

namespace App\Livewire\Ziwaf\Wakaf;

use Livewire\Component;
use App\Models\pilihan_wakaf;

class Wakaf extends Component
{
    public $wakaf = '';
    public $wakaf2 = '';
    public $selectedOption = '';
    public $data;
    public $jenis3;
    public $atasNama;
    public $pilihan_wakafs;


    public function rules()
    {
        return [
            'wakaf' => 'required',
            'wakaf2' => 'integer|min:50000',
            'selectedOption' => 'required',
            'atasNama' => 'required|string',
            'jenis3' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'wakaf.required' => 'Nominal wakaf harus diisi.',
            'wakaf2.min' => 'Nominal wakaf minimal 50.000',
            'selectedOption.required' => 'Pilihan wakaf harus dipilih.',
            'atasNama.required' => 'Atas nama harus diisi.',
            'jenis3.required' => 'Jenis harus dipilih.',
        ];
    }

    public function mount()
    {
        $this->pilihan_wakafs = pilihan_wakaf::all();
    }

    public function submitwaif()
    {
        $this->wakaf2 = !empty($this->wakaf) ? (float) str_replace('.', '', $this->wakaf) : 0;
        // dd($this->wakaf2, $this->wakaf);
        $this->validate();

        $this->data = [
            'nominal' => $this->wakaf2,
            'jenis' => $this->selectedOption,
            'atasnama' => $this->atasNama,
            'jenis3' => $this->jenis3
        ];
        return redirect()->route('wakaf.data')
            ->with('data', $this->data);
    }

    public function render()
    {
        return view('livewire.ziwaf.wakaf.wakaf')->layout('layouts.mobile');
    }
}

