<?php

namespace App\Livewire\Navbar;

use Livewire\Component;

class Navlink extends Component
{
    public $title;
    public $url;
    public $links = [];
    public $isDropdown = false;

    public function mount($title, $links = [], $isDropdown = false)
    {
        $this->title = $title;
        $this->links = $links;
        $this->isDropdown = $isDropdown;
    }
    public function render()
    {
        return view('livewire.navbar.navlink');
    }
}
