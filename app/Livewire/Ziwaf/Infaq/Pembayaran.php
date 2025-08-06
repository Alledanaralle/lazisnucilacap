<?php

namespace App\Livewire\Ziwaf\Infaq;

use Livewire\Component;

class Pembayaran extends Component
{
    public $username;
    public $atasNama;
    public $jenis3;
    public $no_telp;
    public $email;
    public $nominal;
    public $donatur;
    public $token;
    public $jenis_ziwaf;
    public function mount(){
        $this->donatur = session('donatur');

        if ($this->donatur) {
            $this->username = $this->donatur['username'];
            $this->nominal = $this->donatur['nominal'];
            $this->no_telp = $this->donatur['no_telp'];
            $this->email = $this->donatur['email'] ?? null;
            $this->jenis_ziwaf = $this->donatur['jenis_ziwaf'];
            $this->atasNama = $this->donatur['atasNama'];
            $this->jenis3 = $this->donatur['jenis3'];
        } else {
            return redirect()->route('fidyah.index');
        }

    }
    public function render()
    {
        return view('livewire.ziwaf.infaq.pembayaran')->layout('layouts.none');
    }
}
