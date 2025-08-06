<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\petugas;

class WaSplash extends Component
{
    public $pesan;
    public $nomorTujuan;
    public function mount()
    {
        $petugases = petugas::where('bagian', 'mobiznu')->latest()->first();
        $this->nomorTujuan = $petugases->no;
        

        $this->pesan = session('pesan', 'all');
        
        
    }
    
    public function redirectwithdelay()
    {
        // sleep(2);
        // URL untuk mengirimkan pesan WhatsApp
        $url = 'https://api.whatsapp.com/send?phone=' . $this->nomorTujuan . '&text=' . urlencode($this->pesan);
        // Redirect ke URL WhatsApp
        return redirect()->away($url);
    }

    public function render()
    {
        return view('livewire.wa-splash');
    }
}
