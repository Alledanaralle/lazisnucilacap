<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;
    public $zakat = [
        'nominal' => 0,
        'jenis1' => '',
        'jenis2' => '',
    ];
    public $qurban = [
        'nominal' => 0,
        'jenis' => '',
        'mudhohi' => '',
        'jumlah' => '',
    ];
    public $muzakki = [
        'namaMuzakki' => [],
        'jumlah' => '',
        'zakatFitrah' => 0,
    ];

    public function mount()
    {
        // Ambil qurban zakat dari session jika ada
        $this->zakat = session('zakat', $this->zakat);
        $this->qurban = session('qurban', $this->qurban);
        $this->muzakki = session('muzakki', $this->muzakki);
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.none')->layout('layouts.none');
    }

    public function login()
    {
        // Validasi input
        $validatedData = $this->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'password.required' => 'Password wajib diisi',
            'email.required' => 'Email wajib diisi',
        ]);

        // Cek apakah username ada di database
        $user = User::where('email', $validatedData['email'])->first();

        if ($user) {
            // Coba login user
            if (
                Auth::attempt([
                    'email' => $validatedData['email'],
                    'password' => $validatedData['password']
                ])
            ) {
                if ($this->zakat['nominal'] > 0 && !empty($this->zakat['jenis1']) && !empty($this->zakat['jenis2'])) {
                    return redirect()->route('zakat.data')
                        ->with('zakat', $this->zakat);
                }elseif($this->qurban['nominal'] > 0 && !empty($this->qurban['jenis']) && !empty($this->qurban['mudhohi']) && !empty($this->qurban['jumlah'])) {
                    return redirect()->route('qurban.data')
                        ->with('qurban', $this->qurban);
                } elseif ($this->muzakki['zakatFitrah'] > 0 && !empty($this->muzakki['jumlah']) && !empty($this->muzakki['namaMuzakki'])) {
                    return redirect()->route('zakat.data')
                        ->with('muzakki', $this->muzakki);
                } else {
                    // dd($this->muzakki);
                    return redirect()->route('landing');
                }
            } else {
                $this->password = '';
                throw ValidationException::withMessages([
                    'password' => 'Password salah.',
                ]);
            }
        } else {
            // Jika username tidak ditemukan
            throw ValidationException::withMessages([
                'email' => 'Email tidak ditemukan.',
            ]);
        }
    }
}
