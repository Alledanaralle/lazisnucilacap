<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Auth;
use Hash;

class Account extends Component
{
    public $id_user;
    public $username;
    public $first_name;
    public $last_name;
    public $no_telp;
    public $password;
    public $email;

    public function mount()
    {
        $user = Auth::user();

        $this->id_user = $user->id;
        $this->username = $user->username;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->no_telp = $user->no_telp;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate([
            'username' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'no_telp' => 'required|string',
            'password' => 'nullable|string',
            'email' => ['required', 'regex:/^[\w\.-]+@gmail\.com$/'],


        ], [
            'username.required' => 'Username wajib diisi.',
            'first_name.required' => 'Nama Depan wajib diisi',
            'no_telp.required' => 'Nomer telepon wajib diisi',
            'password.required' => 'Password wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'email.unique' => 'Email sudah dipakai. Buat email yang lain',
            'email.required' => 'Email wajib diisi',
            'email.regex' => 'Email harus berupa @gmail.com',
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
        return view('livewire.profile.account')->layout('layouts.mobile');
    }
}
