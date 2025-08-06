<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profil extends Component
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
        return view('livewire.profil', [
            'users' => $this->users,
        ])->layout('layouts.mobile');
    }
}
