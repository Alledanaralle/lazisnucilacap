<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;
use App\Models\petugas;

class PengajuanMobiznu extends Component
{
    use WithFileUploads;
    public $users;
    public $id_user;
    public $nama;
    public $email;
    public $no_telp;
    public $jenis = "";
    public $keperluan = "";
    public $lainnya;
    public $tanggal;
    public $jemput;
    public $waktu_jemput;
    public $tujuan;
    public $nomorTujuan;
    public $petugases;
    public $nama_admin;



    public function mount()
    {
        $users = Auth::user();
        if ($users) {
            $this->id_user = $users->id_user;
            $this->nama = $users->username;
            $this->no_telp = $users->no_telp;
        }

        $petugases = petugas::where('bagian', 'mobiznu')->latest()->first();
        $this->nomorTujuan = $petugases->no;
        $this->nama_admin = $petugases->nama;
    }


    protected function rules()
    {
        return [
            'id_user' => 'nullable|integer',
            'nama' => 'required|string',
            'no_telp' => 'required|string',
            'jenis' => 'required|string',
            'keperluan' => 'required|string',
            'tanggal' => 'required|date|after_or_equal:today',
            'jemput' => 'required|string',
            'waktu_jemput' => 'required|string',
            'tujuan' => 'required|string',
            'lainnya' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'jenis.required' => 'Jenis layanan wajib diisi.',
            'keperluan.required' => 'Keperluan layanan wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
            'jemput.required' => 'Jemput wajib diisi.',
            'waktu_jemput.required' => 'Waktu jemput wajib diisi.',
            'tujuan.required' => 'Tujuan wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
        ];
    }

    public function save()
    {
        // Validasi data
        $validatedData = $this->validate();

        $keperluanPesan = $validatedData['keperluan'];
        if ($validatedData['keperluan'] === 'Lainnya') {
            $keperluanPesan = $validatedData['lainnya'] ?? ''; // Gunakan isi lainnya jika ada
        }

        // Format pesan WhatsApp
        $pesan = "PENGAJUAN LAYANAN AMBULANCE\n\n" .
            "Assalamualaikum, {$this->nama_admin}\n" .
            "Berikut pengajuan layanan ambulance untuk dapat ditindaklanjuti.\n\n" .
            "Nama Pemohon\n" .
            "{$validatedData['nama']}\n\n" .
            "No HP\n" .
            "{$validatedData['no_telp']}\n\n" .
            "Jenis Layanan\n" .
            "{$validatedData['jenis']}\n\n" .
            "Keperluan\n" .
            "{$keperluanPesan}\n\n" .
            "Hari, Tanggal\n" .
            "{$validatedData['tanggal']}\n\n" .
            "Waktu Jemput\n" .
            "{$validatedData['waktu_jemput']}\n\n" .
            "Lokasi Jemput\n" .
            "{$validatedData['jemput']}\n\n" .
            "Lokasi Tujuan\n" .
            "{$validatedData['tujuan']}\n\n" .
            "⿡ Harap koordinator ambulance segera konfirmasi kepada pemohon.\n" .
            "⿢ Input data rekam jejak pelayanan melalui mobisnu.\n" .
            "https://mobisnu.nucarecilacap.id";

        return redirect()->route('wa_splash')->with('pesan', $pesan);

    }




    #[On('formCreated')]
    public function handleberitaCreated()
    {
        session()->flash('message', 'Form Sukses Dikirim');
    }

    public function render()
    {
        return view('livewire.pengajuan-mobiznu', [
            'users' => $this->users,
            'petugases' => $this->petugases,
        ])->layout('layouts.mobile');
    }
}
