<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\pilar_program;

class Usermenu extends Component
{
    public $pilars;

    public function mount()
    {
        $this->pilars = pilar_program::all();
    }
    public function render()
    {
        $pilarLinks = [];

        foreach ($this->pilars as $item) {
            $pilarLinks[] = [
                'href' => '/pilar/' . $item->slug,
                'text' => $item->nama . ' (' . $item->kategori->nama_kategori . ')',
            ];
        }


        return view('livewire.navbar.usermenu', [
            'pilarLinks' => $pilarLinks,
        ]);
    }
}
