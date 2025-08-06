<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\konfirmasi;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class UserKonfirmasi extends Component
{
    use WithFileUploads;
    public $campaigns;
    public $users;
    public $id_user;
    public $nama;
    public $email;
    public $no_telp;
    public $campaign = '';
    public $bukti;

    public function mount()
    {
        $this->reset();
        
        $users = Auth::user();
        if ($users) {
            $this->id_user = $users->id_user;
            $this->nama = $users->username;
            $this->no_telp = $users->no_telp;
            $this->email = $users->email ?? null;
        }
    }

    public function loadCampaigns()
    {
        $query = Campaign::query();
        $this->campaigns = $query->latest()->get();
    }

    protected function rules()
    {
        return [
            'id_user' => 'nullable|integer',
            'nama' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'nullable|string',
            'campaign' => 'required|string',
            'bukti' => 'required|image|', // Validasi gambar
        ];
    }

    protected function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.string' => 'Nomor telepon harus berupa teks.',
            'email.string' => 'Email harus berupa teks.',
            'campaign.required' => 'Campaign wajib diisi.',
            'campaign.string' => 'Campaign harus berupa teks.',
            'bukti.required' => 'Bukti wajib diunggah.',
            'bukti.image' => 'Bukti harus berupa file gambar yang valid.',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        // Simpan file gambar dan ambil path-nya
        $path = $this->bukti->store('images/bukti_tf', 'public'); // Simpan di storage/public

        $id_campaign = Campaign::where('title', $validatedData['campaign'])->value('id_campaign');

        // Simpan data ke database
        $konfirmasi = konfirmasi::create([
            'id_user' => $this->id_user, // Use $this->id_user
            'nama' => $validatedData['nama'],
            'no_telp' => $validatedData['no_telp'],
            'email' => $validatedData['email'],
            'id_campaign' => $id_campaign,
            'bukti' => $path, // Simpan path gambar
        ]);

        // $this->mount();

        $this->dispatch('created', ['message' => 'Formulir Berhasil di kirim']);

        return $konfirmasi;

    }
    
    public function render()
    {
        $this->loadCampaigns();
        return view('livewire.user-konfirmasi',[
            'campaigns' => $this->campaigns,
            'users' => $this->users
        ])->layout('layouts.mobile');
    }
}
