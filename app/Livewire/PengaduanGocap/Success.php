<?php

namespace App\Livewire\PengaduanGocap;

use Livewire\Component;
use App\Models\petugas;

class Success extends Component
{
    public $pesan;
    public $nomorTujuan;
    public function mount()
    {
        $petugases = petugas::where('bagian', 'Pengaduan')->latest()->first();
        $this->nomorTujuan = $petugases->no;

        $this->pesan = session('pesan', 'all');
        
        
    }
    
    public function redirectwithdelay()
    {
        sleep(2);
        $url = 'https://api.whatsapp.com/send?phone=' . $this->nomorTujuan . '&text=' . urlencode($this->pesan);
        return redirect()->away($url);
    }
    public function render()
    {
        return view('livewire.pengaduan-gocap.success');
    }
}
