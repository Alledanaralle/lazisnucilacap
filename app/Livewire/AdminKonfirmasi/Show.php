<?php

namespace App\Livewire\AdminKonfirmasi;

use Livewire\Component;
use App\Models\konfirmasi;

class Show extends Component
{
    public $id_konfirmasi;
    public $konfirmasi;

    public function mount($id_konfirmasi)
    {
        $this->id_konfirmasi = $id_konfirmasi;
        $this->konfirmasi = konfirmasi::find($id_konfirmasi);
        $this->konfirmasi->title = $this->konfirmasi->campaign->title;

        // dd($this->konfirmasi);
    }
    public function render()
    {
        return view('livewire.admin-konfirmasi.show');
    }
}
