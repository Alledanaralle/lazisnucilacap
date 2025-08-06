<?php

namespace App\Livewire\PilihanWakafAdmin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\pilihan_wakaf;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    #[On('pilihan_wakafUpdated')]
    public function handlepilihan_wakafEdited()
    {
        // session()->flash('message', 'pilihan_wakaf Updated Successfully');
        $this->dispatch('created', ['message' => 'pilihan wakaf Updated Successfully']);

    }

    public function destroy($id)
    {
        $pilihan_wakaf = pilihan_wakaf::find($id);
            // Hapus data pilihan_wakaf
            $pilihan_wakaf->delete();

            // Tampilkan pesan sukses
            // session()->flash('message', 'pilihan_wakaf destroyed successfully.');
            // $this->dispatch('created', ['message' => 'pilihan_wakaf Created Successfully']);
            $this->dispatch('created', ['message' => 'pilihan wakaf Deleted Successfully']);


    }

    #[On('pilihan_wakafCreated')]
    public function handlepilihan_wakafCreated()
    {
        // session()->flash('message', 'pilihan_wakaf Created Successfully');
        $this->dispatch('created', ['message' => 'pilihan wakaf Created Successfully']);

    }

    public function render()
    {
        $pilihan_wakafs = pilihan_wakaf::query()
            ->where('pil_wakaf', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.pilihan-wakaf-admin.index', [
            'pilihan_wakafs' => $pilihan_wakafs,
        ])->layout('layouts.admin');
    }
}
