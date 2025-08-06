<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Daftar extends Component
{
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $no_telp;
    public $email;
    public $alamat;

    public function simpan()
    {
        $this->validate([
            'username' => 'required|',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'no_telp' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'email' => ['required', 'regex:/^[\w\.-]+@gmail\.com$/', 'unique:users'],

        ], [
            'username.required' => 'Username wajib diisi.',
            'first_name.required' => 'Nama Depan wajib diisi',
            'no_telp.required' => 'Nomer telepon wajib diisi',
            'password.required' => 'Password wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah dipakai. Gunakan email yang lain',
            'email.regex' => 'Email harus berupa @gmail.com',
        ]);

        $user = User::create([
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => bcrypt($this->password),
            'no_telp' => $this->no_telp,
            'email' => $this->email,
            'role' => 'donatur',
            'alamat' => $this->alamat,
        ]);

        if ($user) {
            session()->flash('success', 'Registrasi Berhasil');
            return redirect()->route('login');
        } else {
            session()->flash('success', 'Registrasi Gagal');

        }
    }

    public function render()
    {
        return view('livewire.daftar')->layout('layouts.none')->layout('layouts.mobile');
    }
}
