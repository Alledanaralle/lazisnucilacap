<?php

namespace App\Livewire\Ziwaf\Fidyah;

use Livewire\Component;

class Pembayaran extends Component
{
    public $username;
    public $atasNama;
    public $no_telp;
    public $email;
    public $nominal;
    public $donatur;
    public $token;
    public $hari;

    public function mount(){
        $this->donatur = session('donatur');

        if ($this->donatur) {
            $this->username = $this->donatur['username'];
            $this->nominal = $this->donatur['nominal'];
            $this->hari = $this->donatur['hari'];
            $this->atasNama = $this->donatur['atasNama'];
            $this->no_telp = $this->donatur['no_telp'];
            $this->email = $this->donatur['email'];
        } else {
            return redirect()->route('fidyah.index');
        }

    }
    public function back(){
        $data = [
            'nominal' => $this->nominal,
            'hari' => $this->hari,
            'atasNama' => $this->atasNama,
        ];
        return redirect()->route('fidyah.data')->with('data', $data);

    }
    public function render()
    {
        return view('livewire.ziwaf.fidyah.pembayaran')->layout('layouts.none');
    }
}
