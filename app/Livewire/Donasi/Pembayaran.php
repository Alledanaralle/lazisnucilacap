<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donasi;
use App\Models\Doa;
use App\Models\Transaction;
use Livewire\Attributes\Rule;
use Auth;
use Exception;

class Pembayaran extends Component
{
    public Campaign $campaign;
    public $nominal;
    public $transaction;
    public $token;
    public $redirectUrl;

    #[Rule('required|string')]
    public $username;
    #[Rule('required|string')]
    public $no_telp;
    #[Rule('nullable|string')]
    public $email;
    #[Rule('nullable|email')]
    public $doa;

    public function mount($title)
    {
        // Decode the title from URL encoding
        $decodedTitle = urldecode($title);

        // Find the campaign by the decoded title
        $this->campaign = Campaign::where('title', $decodedTitle)->firstOrFail();

        $this->donatur = session('donatur');

        if ($this->donatur) {
            $this->username = $this->donatur['username'];
            $this->nominal = $this->donatur['nominal'];
            $this->no_telp = $this->donatur['no_telp'];
            $this->email = $this->donatur['email'];
            $this->doa = $this->donatur['doa'];
        } else {
            return redirect()->route('donasi.index', ['title' => urlencode($this->campaign->title)]);
        }
    }

    public function donasi()
    {
        return redirect($this->redirectUrl);
    }

    public function render()
    {
        return view('livewire.donasi.pembayaran', [
            'transaction' => $this->transaction
        ])->layout('layouts.none');
    }
}
