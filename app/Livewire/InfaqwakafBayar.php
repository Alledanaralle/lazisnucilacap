<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class InfaqwakafBayar extends Component
{
    public $waif;

    public function mount(Request $request)
    {
        $this->waif = $request->query('waif', '');
    }

    public function render()
    {
        return view('livewire.infaqwakaf-bayar')->layout('layouts.none');
    }
}
