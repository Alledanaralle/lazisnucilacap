<?php

namespace App\Livewire\Pengajuan;

use Livewire\Component;
use App\Models\User;
use App\Models\Pengajuan;
use Livewire\Attributes\Rule;
use Auth;


class Index extends Component
{
    #[Rule(['required','string'])]
    public  $username = "";
    #[Rule(['required','string'])]
    public  $jenis_pemohon = "";
    #[Rule(['required','string'])]
    public  $keterangan = "";
    #[Rule(['required', 'date', 'after_or_equal:today'])]
    public $tanggal_pelaksanaan = "";
    #[Rule(['required','string'])]
    public  $no_telp = "";
    #[Rule(['required','integer'])]
    public  $nominal = "";
    #[Rule(['required','integer'])]
    public  $jumlah_penerima = "";


    protected function messages()
    {
        return [
            'tanggal_pelaksanaan.after_or_equal' => 'Tanggal pelaksanaan tidak boleh sebelum hari ini.',
            'username.required' => 'Nama wajib diisi.',
            'username.string' => 'Nama harus berupa teks.',
            'jenis_pemohon.required' => 'Jenis pemohon wajib diisi.',
            'jenis_pemohon.string' => 'Jenis pemohon harus berupa teks.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'nominal.required' => 'Nominal wajib diisi.',
            'nominal.integer' => 'Nominal harus berupa angka.',
            'jumlah_penerima.required' => 'Jumlah penerima wajib diisi.',
            'jumlah_penerima.integer' => 'Jumlah penerima harus berupa angka.',
        ];
    }
        
    public function mount(){
        $user = Auth::user();
        if($user){
            $this->username = $user->username;
            $this->no_telp = $user->no_telp;
        }
    }
    public function create()
    {
        $user = Auth::user();
        if($user){  
            $id_user = $user->id_user;
            $this->username = $user->username;
            $this->no_telp = $user->no_telp;
        }

        $this->nominal = str_replace('.', '', $this->nominal);
        $validatedData = $this->validate();
        try {
            $pengajuan = Pengajuan::create([
                'id_user' => $id_user ?? null,
                'username' => $validatedData['username'],
                'jenis_pemohon' => $validatedData['jenis_pemohon'],
                'keterangan' => $validatedData['keterangan'],
                'tanggal_pelaksanaan' => $validatedData['tanggal_pelaksanaan'],
                'no_telp' => $validatedData['no_telp'],
                'nominal' => $validatedData['nominal'],
                'jumlah_penerima' => $validatedData['jumlah_penerima'],
            ]);
    
            session()->flash('message', 'Data pengajuan berhasil dibuat.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat membuat data pengajuan.');
        }
    
        $this->reset();
    
        return redirect()->route('pengajuan.success');
    }
    

    public function render()
    {
        return view('livewire.pengajuan.index')->layout('layouts.mobile');
    }
}
