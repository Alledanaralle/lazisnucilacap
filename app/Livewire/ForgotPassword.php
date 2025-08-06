<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Component
{
    public $email;

    public function sendPasswordResetLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berupa email',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $user = DB::table('users')->where('email', $this->email)->first();

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $this->email],
            [
                'email' => $this->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        $data = [
            'name' => $user->username, 
            'resetLink' => url("/reset-password/{$token}?email=" . urlencode($this->email)),
        ];


        Mail::to($this->email)->send(new SendEmail($data)); 

        // Success message
        session()->flash('message', 'Password reset link sudah terkirim');
    }

    public function render()
    {
        return view('livewire.forgot-password')->layout('layouts.mobile');
    }
}
