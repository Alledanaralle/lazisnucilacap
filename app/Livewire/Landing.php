<?php

namespace App\Livewire;

use App\Models\Mitra;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Berita;
use App\Models\gambar_landing;
use App\Models\visi;
use App\Models\misi;
use App\Models\Donasi;
use App\Models\petugas;
use App\Models\Transaction;
use App\Models\User;

class Landing extends Component
{
    public $landings;
    public $campaigns;
    public $beritas;
    public $mitras;
    public $visis;
    public $misis;
    public $banyak_donasi;
    public $mitraCount;
    public $petugas;


    public function mount()
    {
        User::createIfEmpty();

        $this->mitraCount = mitra::query()->count();

        $this->petugas = petugas::query()
        ->where('bagian', 'konsultasi zakat')
        ->first();
        // dd($this->petugas);

        $this->banyak_donasi = Donasi::whereHas('transaction', function ($query) {
            $query->where('status', 'success');
        })->count();
        
        $this->landings = gambar_landing::query()
            ->latest()
            ->get();

    }
    public function loadVisiMisi(){
         $this->visis = visi::orderBy('order', 'asc')->get();

        $this->misis = misi::orderBy('order', 'asc')->get();
    }
    public function loadCampaigns()
    {
        Campaign::updateRaisedValues();
        $this->campaigns = Campaign::query()
            ->latest()
            ->take(3)
            ->get();
        foreach ($this->campaigns as $campaign) {
            $raised = $campaign->raised;
            $goal = $campaign->goal;
            $progress = $raised / $goal * 100;
            if ($progress > 100) {
                $progress = 100;
            }
            $campaign->progress = $progress;
        }
    }
    public function loadBerita(){
        $this->beritas = Berita::query()
        ->latest()
        ->take(3)
        ->get();
    }
    public function loadMitra(){
        $this->mitras = Mitra::query()
            ->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.landing');
    }
}
