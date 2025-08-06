<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Akun extends Component
{
    public $id_user;
    public $username;
    public $first_name;
    public $last_name;
    public $no_telp;
    public $password;

    public function mount()
    {
        $user = Auth::user();

        $this->id_user = $user->id;
        $this->username = $user->username;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->no_telp = $user->no_telp;
    }

    public function update()
    {
        $this->validate([
            'username' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'password' => 'nullable|string|min:8',
        ]);

        $user = Auth::user();
        $user->username = $this->username;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->no_telp = $this->no_telp;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.akun')->layout('layouts.mobile');
    }
}
