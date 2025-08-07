<?php

namespace App\Livewire\AdminDonasi;

use Livewire\Component;
use App\Models\Donasi;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use App\Models\User;

class Edit extends Component
{
    public $id_donasi;

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


    public function mount($id_donasi)
    {
        $donasi = Donasi::find($id_donasi);
        if ($donasi) {
            $this->id_donasi = $donasi->id_donasi;
            $this->jumlah_donasi = $donasi->jumlah_donasi;
            $this->id_campaign = $donasi->id_campaign;
            $this->username = $donasi->username;
            $this->no_telp = $donasi->no_telp;
            $this->email = $donasi->email;
        }
        
    }

    public function update()
    {
        $this->validate([
            'jumlah_donasi' => 'required|integer',
            'id_campaign' => 'required|integer',
            'username' => 'required|string|exists:users,username',
            'no_telp' => 'required|string',
            'email' => 'nullable|email',
        ]);

        

        $donasi = Donasi::find($this->id_donasi);

        $user = User::where('username', $this->username)->first();

        

        if (!$user) {
            session()->flash('error', 'Username tidak ditemukan.');
            return;
        }

         
        $donasi->jumlah_donasi = $this->jumlah_donasi;
        $donasi->id_campaign = $this->id_campaign;
        $donasi->username = $this->username;
        $donasi->no_telp = $this->no_telp;
        $donasi->email = $this->email;

        $donasi->save();
        session()->flash('message', 'Donasi updated successfully.');
        return redirect()->to(url()->previous());
    }


    public function clear($id_donasi)
    {
        $this->reset();
        $donasi = Donasi::find($id_donasi);
        if ($donasi) {
            $this->id_donasi = $donasi->id_donasi;
            $this->jumlah_donasi = $donasi->jumlah_donasi;
            $this->id_campaign = $donasi->id_campaign;
            $this->username = $donasi->username;
            $this->no_telp = $donasi->no_telp;
            $this->email = $donasi->email;
        }
    }
    public function render()
    {
        return view('livewire.admin-donasi.edit');
    }
}