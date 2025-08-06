<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use App\Models\Campaign;

class Index extends Component
{
    public Campaign $campaign;
    public $nominal;
    public $min_donation;

    public function mount($title, $nominal = null)
    {
        $decodedTitle = urldecode($title);
        $this->campaign = Campaign::where('title', $decodedTitle)->firstOrFail();

        // Set the minimum donation amount
        $this->min_donation = $this->campaign->min_donation;

    }

    public function bayar($nominal)
    {
        return redirect()->route('donasi.donatur', ['title' => $this->campaign->title])
            ->with('nominal', $nominal);
    }

    public function bayarCustom()
    {
        // Validate the nominal property
        $this->validate([
            'nominal' => 'required|integer|min:' . $this->campaign->min_donation,
        ], [
            'nominal.min' => 'Donasi Minimal Rp. ' . number_format($this->campaign->min_donation, 0, ',', '.'),
        ]);
        

        // Redirect with the validated nominal amount
        return redirect()->route('donasi.donatur', ['title' => $this->campaign->title])
            ->with('nominal', $this->nominal);
    }

    public function render()
    {
        return view('livewire.donasi.index')->layout('layouts.none');
    }
}
