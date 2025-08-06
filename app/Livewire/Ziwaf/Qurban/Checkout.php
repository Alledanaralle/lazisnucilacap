<?php

namespace App\Livewire\Ziwaf\Qurban;

use Livewire\Component;

class Checkout extends Component
{
    public $nominal;
    public $jenis;
    public $mudhohi;
    public $jumlah;
    public $hewan;
    public $nama;
    public $no;
    public $email;
    public $alamat;
    public $dataqurban;
    public $token;
    public $edit;

    public function mount()
    {
        $dataqurban = session('dataqurban', '');

        if ($dataqurban) {
            $this->nominal = $dataqurban['nominal'];
            $this->jenis = $dataqurban['jenis'];
            $this->mudhohi = $dataqurban['mudhohi'];
            $this->jumlah = $dataqurban['jumlah'];
            $this->hewan = $dataqurban['hewan'];
            $this->nama = $dataqurban['nama'];
            $this->no = $dataqurban['no'];
            $this->email = $dataqurban['email'];
            $this->alamat = $dataqurban['alamat'];
        } else {
            return redirect()->route('zakat');
        }
    }

    public function back()
    {
        $this->edit = [
            'nominal' => $this->nominal,
            'jenis' => $this->jenis,
            'mudhohi' => $this->mudhohi,
            'jumlah' => $this->jumlah,
            'hewan' => $this->hewan,
            'nama' => $this->nama,
            'no' => $this->no,
            'email' => $this->email,
            'alamat' => $this->alamat,

        ];

        return redirect()->route('qurban.data')
            ->with('edit', $this->edit);
    }

    public function render()
    {
        $mudhohiList = json_decode($this->mudhohi, true);

        return view('livewire.ziwaf.qurban.checkout', [
            'mudhohiList' => $mudhohiList
        ])->layout('layouts.none');
    }
}
