<?php

namespace App\Livewire\PilarProgram;

use App\Models\pilar_program;
use App\Models\berita;
use App\Models\Campaign;
use Livewire\Component;

class Show extends Component
{
    public $slug;
    public $pilar;
    public $beritas;
    public $campaigns;
    public $firstWords;
    public $remainingWords;
    public $showRemaining = false;
    public $selectedSdgs = [];

    public $sdgs = [
        ['id' => 1, 'image' => '01-No poverty.png', 'label' => 'No Poverty'],
        ['id' => 2, 'image' => '02-Zero hunger.png', 'label' => 'Zero Hunger'],
        ['id' => 3, 'image' => '03-Good health and well-being.png', 'label' => 'Good Health and Well-being'],
        ['id' => 4, 'image' => '04-Quality education.png', 'label' => 'Quality Education'],
        ['id' => 5, 'image' => '05-Gender equality.png', 'label' => 'Gender Equality'],
        ['id' => 6, 'image' => '06-Clean water and sanitation.png', 'label' => 'Clean Water and Sanitation'],
        ['id' => 7, 'image' => '07-Affordable and clean energy.png', 'label' => 'Affordable and Clean Energy'],
        ['id' => 8, 'image' => '08-Decent work and economic growth.png', 'label' => 'Decent Work and Economic Growth'],
        ['id' => 9, 'image' => '09-Industry, innovation and infrastructure.png', 'label' => 'Industry, Innovation and Infrastructure'],
        ['id' => 10, 'image' => '10-Reduced inequalities.png', 'label' => 'Reduced Inequality'],
        ['id' => 11, 'image' => '11-Sustainable cities and communities.png', 'label' => 'Sustainable Cities and Communities'],
        ['id' => 12, 'image' => '12-Responsible consuption and production.png', 'label' => 'Responsible Consumption and Production'],
        ['id' => 13, 'image' => '13-Climate action.png', 'label' => 'Climate Action'],
        ['id' => 14, 'image' => '14-Life below water.png', 'label' => 'Life Below Water'],
        ['id' => 15, 'image' => '15-Life on land.png', 'label' => 'Life on Land'],
        ['id' => 16, 'image' => '16-Peace, justice and strong institutions.png', 'label' => 'Peace, Justice and Strong Institutions'],
        ['id' => 17, 'image' => '17-Partnerships for the goals.png', 'label' => 'Partnerships for the Goals'],
    ];


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->pilar = pilar_program::where('slug', $this->slug)->firstOrFail();
        $this->beritas = berita::where('id_kategori', $this->pilar->id_kategori)->get();
        $this->campaigns = Campaign::where('id_kategori', $this->pilar->id_kategori)->get();

        $N = 1;

        // Split the string into words
        $words = explode('.', $this->pilar->deskripsi);

        // Get the first N words
        $this->firstWords = implode('.', array_slice($words, 0, $N));

        // Get the remaining words
        $this->remainingWords = implode(' ', array_slice($words, $N));
        $this->id_kategori = $this->pilar->id_kategori;
        $this->deskripsi = $this->pilar->deskripsi;

        // Assuming sdgs is stored as a binary string
        $this->selectedSdgs = [];
        for ($i = 0; $i < strlen($this->pilar->sdgs); $i++) {
            if ($this->pilar->sdgs[$i] === '1') {
                $this->selectedSdgs[] = $i + 1; // Convert index to SDG ID (1-based)
            }
        }
    }

    public function toggleRemaining()
    {
        $this->showRemaining = !$this->showRemaining; // Toggle the state
    }

    public function render()
    {
        return view('livewire.pilar-program.show')
            ->layout('layouts.mobile');
    }
}
