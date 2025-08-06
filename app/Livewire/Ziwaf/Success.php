<?php

namespace App\Livewire\Ziwaf;

use Livewire\Component;

class Success extends Component
{
    public $statusCode;
    public $route;

    public function mount()
    {
        $this->route = request()->query('route');
        $this->statusCode = request()->query('status_code');
        if ($this->statusCode == 200) {
        } else {
            return redirect()->route('landing');
        }
    }

    public function goCampaign()
    {
        return redirect()->route($this->route);
    }
    public function render()
    {
        return view('livewire.ziwaf.success')->layout('layouts.none');
    }
}
