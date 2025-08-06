<?php

namespace App\Livewire\Ziwaf\Wakaf;

use Livewire\Component;

class CheckoutWakaf extends Component
{
    public $nominal;
    public $jenis;
    public $nama;
    public $no;
    public $email;
    public $datawakaf;
    public $token;
    public $atasNama;
    public $jenis3;


    public function mount()
    {
        $datawakaf = session('datawakaf', '');

        if ($datawakaf) {
            $this->nominal = $datawakaf['nominal'];
            $this->jenis = $datawakaf['jenis'];
            $this->nama = $datawakaf['nama'];
            $this->no = $datawakaf['no'];
            $this->email = $datawakaf['email'];
            $this->atasNama = $datawakaf['atasNama'];
            $this->jenis3 = $datawakaf['jenis3'];
        } else {
            return redirect()->route('wakaf');
        }
    }

    public function back()
    {
        $this->datawakaf = [
            'nominal' => $this->nominal,
            'jenis1' => $this->jenis,
            'nama' => $this->nama,
            'no' => $this->no,
            'email' => $this->email,
            'atasNama' => $this->atasNama,
            'jenis3' => $this->jenis3

        ];

        return redirect()->route('pembayaran-infaq&wakaf')
            ->with('datawakaf', $this->datawakaf);
    }

    public function render()
    {
        return view('livewire.ziwaf.wakaf.checkout-wakaf')->layout('layouts.none');
    }
}
