<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\User;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

class Riwayat extends Component
{
    public $donatur;
    public $waktu_donasi;

    public function mount()
    {
        $user = Auth::user();
    
        $this->id_user = $user->id_user;
    
        $this->user = User::find($this->id_user);
    
        $this->donasis = Donasi::where('id_user', $this->id_user)
            ->whereHas('transaction', function ($query) {
                $query->where('status', 'success');
            })
            ->get();

        foreach ($this->donasis as $donasi) {
            $value = \Carbon\Carbon::parse($donasi->created_at)->diffInDays();
            $donasi->waktu_donasi = floor($value);
            $this->campaign = Campaign::where('id_campaign', $donasi->id_campaign)->get()->first();
            $image = $this->campaign->main_picture;
            $donasi->image = $image;
            $title = $this->campaign->title;
            $donasi->title = $title;
        }
    }
    

    public function render()
    {
        return view('livewire.riwayat', [
            'donasis' => $this->donasis,
            'waktu_donasi' => $this->waktu_donasi
        ])->layout('layouts.mobile');
    }
}
