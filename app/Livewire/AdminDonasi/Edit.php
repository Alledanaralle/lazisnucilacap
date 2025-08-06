<?php

namespace App\Livewire\AdminDonasi;

use Livewire\Component;
use App\Models\Donasi;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;



class Edit extends Component
{
    public $id_donasi;

    #[Rule('required|integer')]
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
        return $donasi;

    }

    public function update()
    {
        $this->validate();


        $donasi = donasi::find($this->id_donasi);

        $donasi->id_user = $this->id_user;
        $donasi->jumlah_donasi = $this->jumlah_donasi;
        $donasi->id_campaign = $this->id_campaign;

        $donasi->save();
        session()->flash('message', 'Donasi updated successfully.');
        $this->clear($this->id_donasi);
        $this->reset();
        $this->dispatch('postUpdated');
        return $donasi;
    }


    public function clear($id_donasi)
    {
        $this->reset();
        $this->dispatch('refreshComponent');
        $donasi = Donasi::find($id_donasi);
        if ($donasi) {
            $this->id_donasi = $donasi->id_donasi;
            $this->id_user = $donasi->id_user;
            $this->jumlah_donasi = $donasi->jumlah_donasi;
            $this->id_campaign = $donasi->id_campaign;

        }

    }
    public function render()
    {
        return view('livewire.admin-donasi.edit');
    }
}
