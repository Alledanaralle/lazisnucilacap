<?php

namespace App\Livewire\PilarProgram;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\pilar_program;

class Index extends Component
{
    #[On('pilar_programUpdated')]
    public function handlepilar_programEdited()
    {
        $this->dispatch('updated', ['message' => 'Pilar and Program Updated Successfully']);
        // session()->flash('message', 'misi Updated Successfully ');

    }

    public function destroy($id)
    {
        $pilar_program = pilar_program::find($id);

        // Hapus data pilar_program
        $pilar_program->delete();

        // Tampilkan pesan sukses
        $this->dispatch('destroyed', ['message' => 'Pilar and Program deleted Successfully']);
        // session()->flash('message', 'misi destroyed successfully.');

    }


    #[On('pilar_programCreated')]
    public function handlepilar_programCreated()
    {
        $this->dispatch('created', ['message' => 'Pilar and Program created Successfully']);
        // session()->flash('message', 'misi Created Successfully ');


    }
    
    #[On('pilar_programUpdated')]
    public function handlepilar_programUpdated()
    {
        $this->dispatch('updated', ['message' => 'Pilar and Program updated Successfully']);
        // session()->flash('message', 'misi Created Successfully ');


    }


    public function render()
    {

        $pilar_programs = pilar_program::all();

        return view('livewire.pilar-program.index', [
            'pilar_programs' => $pilar_programs
        ])->layout('layouts.admin');
    }
}
