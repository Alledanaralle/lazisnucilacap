<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use Auth;
use App\Models\Transaction;

class Success extends Component
{
    public $statusCode;
    public $title;

    public function mount()
    {
        $this->title = request()->query('title');
        $this->statusCode = request()->query('status_code');
        if ($this->statusCode == 200) {
        } else {
            return redirect()->route('campaign');
        }
    }

    public function goCampaign()
    {
        return redirect()->route('campaigns.show', $this->title);
    }

    public function render()
    {
        return view('livewire.donasi.success')->layout('layouts.none');
    }
}

