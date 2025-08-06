<?php

namespace App\Livewire\PilarProgram;

use App\Models\pilar_program;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $img; 
    public $slug;
    public $id_kategori;
    public $selectedSdgs = [];
    public $nama;
    public $deskripsi;
    public $kategori;
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
    


    public function mount()
    {
        $this->kategori = Kategori::all();
    }

    protected function rules()
    {
        return [
            'img' => 'required|image',
            'slug' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'id_kategori' => 'required|string',
        ];
    }

    public function updatedSlug($value)
    {
        $this->slug = str_replace(' ', '_', $value);
    }   

    public function save()
    {
        $this->validate();
        
        $path = $this->img->store('images/pilar_program', 'public'); 
        
        $sdgBinary = str_repeat('0', 17); 
        

        foreach ($this->selectedSdgs as $sdgId) {
            $index = $sdgId - 1; 
            $sdgBinary[$index] = '1'; 
        }
        

        $pilar_program = pilar_program::create([
            'img' => $path, 
            'slug' => $this->slug,
            'id_kategori' => $this->id_kategori,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'sdgs' => $sdgBinary, 
        ]);
    

        $this->nama = null;
        $this->slug = null;
        $this->img = null;
        $this->deskripsi = null;
        $this->selectedSdgs = [];
    

        $this->dispatch('pilar_programCreated');
    
        return $pilar_program;
    }
    

    public function render()
    {
        return view('livewire.pilar-program.create');
    }
}
