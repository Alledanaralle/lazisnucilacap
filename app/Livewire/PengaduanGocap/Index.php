<?php

namespace App\Livewire\PengaduanGocap;

use Livewire\Component;
use App\Models\PengajuanGocap;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use App\Models\petugas;

class Index extends Component
{
    use WithFileUploads;
    public $users;
    public $id_user;
    public $username;
    public $no_telp;
    public $jabatan;
    public $kendala;
    public $image;

    public function mount()
    {
        $users = Auth::user();
        if ($users) {
            $this->id_user = $users->id_user;
            $this->username = $users->username;
            $this->no_telp = $users->no_telp;
        }else{
            $this->id_user = null;

        }
    }

    protected function rules()
    {
        return [
            'id_user' => 'nullable|integer',
            'username' => 'required|string',
            'no_telp' => 'required|string',
            'jabatan' => 'required|string',
            'kendala' => 'required|string',
            'image' => 'required|image|', // Validasi gambar
        ];
    }

    protected function messages()
    {
        return [
            'username.required' => 'Nama wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'kendala.required' => 'Kendala wajib diisi.',
            'image.required' => 'Gambar wajib diunggah.',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan file gambar dan ambil path-nya
        $path = $this->image->store('images/kendala', 'public'); // Simpan di storage/public

        // Simpan data ke database
        $pengajuanGocap = PengajuanGocap::create([
            'id_user' => $this->id_user, // Use $this->id_user
            'username' => $validatedData['username'],
            'no_telp' => $validatedData['no_telp'],
            'jabatan' => $validatedData['jabatan'],
            'kendala' => $validatedData['kendala'],
            'image' => $path, 
        ]);

        $this->reset();

        $admin = Petugas::where('bagian', 'Pengaduan')->first();

        $pesan = "PENGADUAN GOCAP\n\n" .
        "Assalamualaikum, {$admin->nama}\n" .
        "Berikut Pengaduan Gocap mohon untuk dapat ditindaklanjuti.\n\n" .
        "Nama Pemohon\n" .
        "{$validatedData['username']}\n\n" .
        "Jabatan Pemohon\n" .
        "{$validatedData['jabatan']}\n\n" .
        "No HP\n" .
        "{$validatedData['no_telp']}\n\n" .
        "Kendala\n" .
        "{$validatedData['kendala']}\n\n" .
        "Harap koordinator segera konfirmasi kepada pemohon.\n" ;

        return redirect()->route('pengajuan-gocap.success')->with('pesan', $pesan);



    }
    

    public function render()
    {
        return view('livewire.pengaduan-gocap.index')->layout('layouts.mobile');
    }
}
