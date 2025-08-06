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
        $this->dispatch('updated', ['message' => 'Petugas Updated Successfully']);

    }

    public function destroy($id_petugas)
    {
        $petugases = petugas::find($id_petugas);

        // Hapus data misi
        $petugases->delete();

        // Tampilkan pesan sukses
        $this->dispatch('destroyed', ['message' => 'Petugas deleted Successfully']);

    }


    #[On('petugasCreated')]
    public function handlepetugasCreated()
    {
        $this->dispatch('created', ['message' => 'Petugas created Successfully']);


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
