<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\User;

class CardDonasi extends Component
{
    public Donasi $donasi;
    public $donatur;
    public function mount($id_donasi)
    {
        $this->donasi = Donasi::find($id_donasi);
        if($this->donasi->hide_name == 'yes'){
            $this->donasi->username = 'Hamba Allah';
        }
        $value = \Carbon\Carbon::parse($this->donasi->created_at)->diffInDays();
        $this->waktu_donasi = floor($value);
    }

    public function render()
    {
        return view('livewire.campaigns.card-donasi', [
            'donasi' => $this->donasi,
            'waktu_donasi' => $this->waktu_donasi

        ]);
    }
}
