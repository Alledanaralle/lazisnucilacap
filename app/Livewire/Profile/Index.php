<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Auth;

class Index extends Component
{
    public $users;
    public $showModal = false;

    public function showLogoutConfirmation()
    {
        $this->showModal = true;
    }
    
    public function mount()
    {
        $this->users = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
    public function render()
    {
        return view('livewire.profile.index',[
            'users' => $this->users,
        ])->layout('layouts.mobile');
    }
}
