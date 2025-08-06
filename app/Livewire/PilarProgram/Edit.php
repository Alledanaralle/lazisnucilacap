<?php

namespace App\Livewire\PilarProgram;

use Livewire\Component;
use App\Models\pilar_program;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    public $nama;
    public $slug;
    public $img;
    public $deskripsi;
    public $id;
    public $pilar_program;
    public $id_kategori;
    public $kategori;
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


    protected function rules()
    {
        return [
            'img' => 'nullable|image',
            'slug' => 'required|string',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'id_kategori' => 'required|string',
        ];
    }


    public function mount()
    {
        $this->kategori = Kategori::all();
        $pilar_program = pilar_program::find($this->id);

        $this->pilar_program = $pilar_program;
        $this->nama = $pilar_program->nama;
        $this->slug = $pilar_program->slug;
        $this->id_kategori = $pilar_program->id_kategori;
        $this->deskripsi = $pilar_program->deskripsi;

        $this->selectedSdgs = [];
        for ($i = 0; $i < strlen($pilar_program->sdgs); $i++) {
            if ($pilar_program->sdgs[$i] === '1') {
                $this->selectedSdgs[] = $i + 1; 
            }
        }
    }

    public function update()
    {
        $this->validate();

        if ($this->img) {
            if ($this->pilar_program->img) {
                Storage::disk('public')->delete($this->pilar_program->img);
            }

            $path = $this->img->store('images/pilar_program', 'public');
            $this->pilar_program->img = $path;
        }


        $sdgBinary = str_repeat('0', 17);
        foreach ($this->selectedSdgs as $sdgId) {
            $index = $sdgId - 1;
            $sdgBinary[$index] = '1';
        }

        $this->pilar_program->nama = $this->nama;
        $this->pilar_program->slug = $this->slug;
        $this->pilar_program->id_kategori = $this->id_kategori;
        $this->pilar_program->deskripsi = $this->deskripsi;
        $this->pilar_program->sdgs = $sdgBinary;

        $this->pilar_program->save();

        $this->dispatch('pilar_programUpdated');

    }

    public function clear(){
        $this->kategori = Kategori::all();
        $pilar_program = pilar_program::find($this->id);

        $this->pilar_program = $pilar_program;
        $this->nama = $pilar_program->nama;
        $this->slug = $pilar_program->slug;
        $this->id_kategori = $pilar_program->id_kategori;
        $this->deskripsi = $pilar_program->deskripsi;

        $this->selectedSdgs = [];
        $sdgString = str_pad((string) $pilar_program->sdgs, 17, '0', STR_PAD_LEFT); // Ensure it is a 17-digit string

        for ($i = 0; $i < strlen($sdgString); $i++) {
            if ($sdgString[$i] === '1') {
                $this->selectedSdgs[] = $i + 1; 
            }
        }
    }
    public function render()
    {
        return view('livewire.pilar-program.edit');
    }
}
