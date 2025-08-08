<?php

namespace App\Livewire\AdminDonasi;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Donasi;
use App\Models\User;

class Create extends Component
{
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
        $this->validate([
            'jumlah_donasi' => 'required|integer',
            'id_campaign' => 'required|integer',
            'username' => 'required|string|exists:users,username', // Validasi username harus ada di tabel users
            'no_telp' => 'required|string',
            'email' => 'nullable|email',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $this->username)->first();

        // Pastikan user ditemukan sebelum melanjutkan
        if (!$user) {
            session()->flash('swal', ['type' => 'error', 'title' => 'Error', 'text' => 'Username tidak ditemukan.']);
            return redirect()->to(url()->previous()); // Atau tampilkan error lain
        }

        $donasi = Donasi::create([
            'id_user' => $user->id_user, // Gunakan id_user dari user yang ditemukan
            'jumlah_donasi' => $this->jumlah_donasi,
            'id_campaign' => $this->id_campaign,
            'username' => $this->username,
            'no_telp' => $this->no_telp,
            'email' => $this->email ?? null,
            'id_transaction' => 1, // Pastikan ini sesuai dengan logika aplikasi Anda
        ]);

        // $donasi->save(); // Baris ini tidak diperlukan karena sudah menggunakan create()
        session()->flash('swal', ['type' => 'success', 'title' => 'Success', 'text' => 'Donasi updated successfully.']);
        return redirect()->to(url()->previous());
        
    }
    public function render()
    {
        return view('livewire.admin-donasi.create');
    }
}