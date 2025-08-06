<?php

namespace App\Livewire\AdminDonasi;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Donasi;
use App\Models\User;


class Create extends Component
{
    #[Rule('nullable|integer')]
    public $id_user;

    #[Rule('required|integer')]
    public $jumlah_donasi;

    #[Rule('required|integer')]
    public $id_campaign;
    #[Rule('required|string')]
    public $username;
    #[Rule('required|string')]
    public $no_telp;
    #[Rule('nullable|email')]
    public $email;


    public function save()
    {
        $this->validate();

        $user = User::find($this->id_user);

        $donasi = Donasi::create([
            'jumlah_donasi' => $this->jumlah_donasi,
            'id_campaign' => $this->id_campaign,
            'username' => $this->username,
            'no_telp' => $this->no_telp,
            'email' => $this->email ?? null,
            'id_transaction' => 1,
        ]);

        $donasi->save();
        session()->flash('message', 'Donasi updated successfully.');
        $this->reset();
        $this->dispatch('postUpdated');
        return $donasi;
    }
    public function render()
    {
        return view('livewire.admin-donasi.create');
    }
}
