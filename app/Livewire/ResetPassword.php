<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Carbon;

class ResetPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public $tokenExpired = false;
    public $tokenInvalid = false;

    // Mount method to pass token and email when route loads
    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');

        $passwordReset = DB::table('password_resets')
            ->where('token', $this->token)
            ->first();
        if (is_null($passwordReset)) {
            $this->tokenInvalid = true;
            return;
        }

        if (Carbon::parse($passwordReset->created_at)->addMinutes(30)->isPast()) {
            $this->tokenExpired = true;
        }

    }

    // Method to handle password reset
    public function resetPassword()
    {
        // Validate the form inputs
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berupa email',
            'email.exists' => 'Email tidak terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        // Check if the token is valid
        $reset = DB::table('password_resets')->where([
            ['email', '=', $this->email],
            ['token', '=', $this->token],
        ])->first();

        if (!$reset) {
            session()->flash('error', 'Error dalam proses reset password, harap mencoba meminta reset password kembali.');
            return;
        }

        // Reset the password
        DB::table('users')->where('email', $this->email)->update([
            'password' => Hash::make($this->password),
        ]);

        // Delete the password reset token
        DB::table('password_resets')->where('email', $this->email)->delete();

        session()->flash('message', 'Password anda telahberhasil diganti.');

        // Redirect or handle post-password reset actions
        return redirect()->to('/login'); // Or any other route
    }

    public function render()
    {
        return view('livewire.reset-password')->layout('layouts.mobile');
    }
}
