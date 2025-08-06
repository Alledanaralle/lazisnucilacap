<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Legalitas extends Component
{
    public function render()
    {
        return view('livewire.legalitas')->layout('layouts.mobile');
    }
}
