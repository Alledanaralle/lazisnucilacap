<?php

namespace App\Livewire\Ziwaf\Infaq;

use Livewire\Component;
use App\Models\pilihan_infaq;

class Index extends Component
{
    public $nominal_infaq;
    public $jenis_ziwaf;
    public $jenis3;
    public $atasNama;

    public $pilihan_infaqs;


    public function mount()
    {
        $this->pilihan_infaqs = pilihan_infaq::all();
    }
    
    protected $rules = [
        'nominal_infaq' => 'required|integer|min:50000',
        'jenis_ziwaf' => 'required|string',
        'atasNama' => 'required|string',
        'jenis3' => 'required',
    ];

    protected $messages = [
        'nominal_infaq.min' => 'Infaq minimal Rp 50.000',
        'nominal_infaq.required' => 'Nominal infaq wajib diisi',
        'jenis_ziwaf.required' => 'Jenis infaq wajib dipilih',
        'atasNama.required' => 'Atas nama wajib diisi',
        'jenis3.required' => 'Jenis wajib dipilih',
    ];

    public function bayarInfaq()
    {
        $this->validate(); // Validate fields
        $rounded_nominal = ceil($this->nominal_infaq / 1000) * 1000;
        $infaq = [
            'nominal' => $rounded_nominal,
            'jenis_ziwaf' => $this->jenis_ziwaf,
            'atasNama' => $this->atasNama,
            'jenis3' => $this->jenis3
        ];

        return redirect()->route('infaq.data')->with('infaq', $infaq);
    }

    public function render()
    {
        return view('livewire.ziwaf.infaq.index')->layout('layouts.mobile');
    }
}
