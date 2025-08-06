<?php

namespace App\Livewire\Ziwaf\Zakat;

use Livewire\Component;

class Checkout extends Component
{
    public $nominal;
    public $jenis1;
    public $jenis2;
    public $jenis3;
    public $atasNama;
    public $nama;
    public $no;
    public $email;
    public $alamat;
    public $datazakat;
    public $token;
    public $zakatFitrah;
    public $jumlah;
    public $datafitrah;
    public $namaMuzakki;


    public function mount()
    {
        $datazakat = session('datazakat', '');
        $datafitrah = session('datafitrah', '');

        if ($datazakat) {
            $this->nominal = $datazakat['nominal'];
            $this->jenis1 = $datazakat['jenis1'];
            $this->jenis2 = $datazakat['jenis2'];
            $this->jenis3 = $datazakat['jenis3'];
            $this->atasNama = $datazakat['atasNama'];
            $this->nama = $datazakat['nama'];
            $this->no = $datazakat['no'];
            $this->email = $datazakat['email'];
            $this->alamat = $datazakat['alamat'];
        } elseif ($datafitrah) {
            $this->zakatFitrah = $datafitrah['zakatFitrah'];
            $this->namaMuzakki = $datafitrah['namaMuzakki'];
            $this->nama = $datafitrah['nama'];
            $this->no = $datafitrah['no'];
            $this->email = $datafitrah['email'];
            $this->jumlah = $datafitrah['jumlah'];
            $this->alamat = $datafitrah['alamat'];
        } else {
            return redirect()->route('zakat');
        }
    }

    public function back()
    {
        $this->datazakat = [
            'nominal' => $this->nominal,
            'jenis1' => $this->jenis1,
            'jenis2' => $this->jenis2,
            'jenis3' => $this->jenis3,
            'atasNama' => $this->atasNama,
            'nama' => $this->nama,
            'no' => $this->no,
            'email' => $this->email,
            'alamat' => $this->alamat,

        ];

        $this->datafitrah = [
            'zakatFitrah' => $this->zakatFitrah,
            'atasNama' => $this->atasNama,
            'jumlah' => $this->jumlah,
            'nama' => $this->nama,
            'no' => $this->no,
            'email' => $this->email,

        ];

        return redirect()->route('pembayaran_zakat')
            ->with([
                'datazakat' => $this->datazakat,
                'datafitrah' => $this->datafitrah
            ]);
    }

    public function render()
    {
        return view('livewire.ziwaf.zakat.checkout')->layout('layouts.none');
    }
}
