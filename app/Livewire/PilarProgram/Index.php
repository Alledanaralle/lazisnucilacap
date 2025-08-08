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
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Pilar and Program Updated Successfully',
        ]);
    }

    public function destroy($id)
    {
        $pilar_program = pilar_program::find($id);

        // Hapus data pilar_program
        $pilar_program->delete();
        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Pilar and Program deleted Successfully.',
        ]);
        return redirect()->to(url()->previous());
        

    }


    #[On('pilar_programCreated')]
    public function handlepilar_programCreated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Pilar and Program created Successfully',
        ]);
    }
    
    #[On('pilar_programUpdated')]
    public function handlepilar_programUpdated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Pilar and Program updated Successfully',
        ]);
    }


    public function render()
    {

        $pilar_programs = pilar_program::all();

        return view('livewire.pilar-program.index', [
            'pilar_programs' => $pilar_programs
        ])->layout('layouts.admin');
    }
}
