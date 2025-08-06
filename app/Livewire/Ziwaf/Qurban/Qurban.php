<?php

namespace App\Livewire\Ziwaf\Qurban;

use Livewire\Component;
use App\Models\pilihan_qurban;

class Qurban extends Component
{
    public $mudhohi = '';
    public $daftar = [];
    public $selectedOption = '';
    public $harga = 0;
    public $nominal = 0;
    public $qurban = [];
    public $pilihan_qurbans;

    
    public function rules()
    {
        $rules = [
            'mudhohi' => 'required|integer|min:1',
            'selectedOption' => 'required',
        ];
        for ($i = 0; $i < $this->mudhohi; $i++) {
            $rules["daftar.$i"] = 'required'; // Validasi untuk setiap nama
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'mudhohi.required' => 'Jumlah mudhohi harus diisi.',
            'mudhohi.integer' => 'Jumlah mudhohi harus berupa angka.',
            'mudhohi.min' => 'Jumlah mudhohi minimal adalah 1.',
            'selectedOption.required' => 'Jenis qurban harus dipilih.',
            'daftar.*.required' => 'Nama mudhohi harus diisi.',
        ];
    }

    public function mount()
    {
        $this->pilihan_qurbans = pilihan_qurban::all();
    }
    public function updatedSelectedOption()
    {
        $this->price();
    }

    public function price()
    {
        if ($this->selectedOption) {
            $pilihan_qurban = pilihan_qurban::where('nama', $this->selectedOption)->first();
            $this->harga = $pilihan_qurban->harga ?? 0;
        }

        if ($this->mudhohi > 0) {
            $this->nominal = $this->harga * $this->mudhohi;
        } else {
            $this->mudhohi = null;
        }
    }


    public function submitqurban()
    {
        $this->validate();
        $mudhohi = $this->mudhohi;
        $daftar = json_encode($this->daftar);
        $selectedOption = $this->selectedOption;
        $nominal = $this->nominal;

        $this->qurban = [
            'jenis' => $selectedOption,
            'jumlah' => $mudhohi,
            'mudhohi' => $daftar,
            'nominal' => $nominal
        ];

        return redirect()->route('qurban.data')
            ->with('qurban', $this->qurban);
    }

    public function render()
    {
        return view('livewire.ziwaf.qurban.qurban')->layout('layouts.mobile');
    }
}
