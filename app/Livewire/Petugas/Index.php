<?php

namespace App\Livewire\Petugas;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\petugas;

class Index extends Component
{
    #[On('petugasUpdated')]
    public function handlepetugasEdited()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Petugas Updated Successfully',
        ]);
    }

    public function destroy($id_petugas)
    {
        $petugases = petugas::find($id_petugas);

        // Hapus data misi
        $petugases->delete();
        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Petugas deleted Successfully.',
        ]);
        return redirect()->to(url()->previous());
        

    }


    #[On('petugasCreated')]
    public function handlepetugasCreated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Petugas created Successfully',
        ]);
    }

    public function render()
    {
        $petugases = petugas::query()
            ->latest()
            ->get();
        return view('livewire.petugas.index',[
                'petugases' => $petugases,
        ])->layout('layouts.admin');
    }
}
