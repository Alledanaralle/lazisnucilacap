<?php

namespace App\Livewire\PilihanQurbanAdmin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\pilihan_qurban;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    #[On('pilihan_qurbanUpdated')]
    public function handlepilihan_qurbanEdited()
    {
        // session()->flash('message', 'pilihan_qurban Updated Successfully');
        $this->dispatch('created', ['message' => 'pilihan qurban Updated Successfully']);

    }

    public function destroy($id)
    {
        $pilihan_qurban = pilihan_qurban::find($id);
        // Hapus data pilihan_qurban
        $pilihan_qurban->delete();

        // Tampilkan pesan sukses
        // session()->flash('message', 'pilihan_qurban destroyed successfully.');
        // $this->dispatch('created', ['message' => 'pilihan_qurban Created Successfully']);
        $this->dispatch('created', ['message' => 'pilihan qurban Deleted Successfully']);


    }

    #[On('pilihan_qurbanCreated')]
    public function handlepilihan_qurbanCreated()
    {
        // session()->flash('message', 'pilihan_qurban Created Successfully');
        $this->dispatch('created', ['message' => 'pilihan qurban Created Successfully']);

    }

    public function render()
    {
        $pilihan_qurbans = pilihan_qurban::query()
            ->where('nama', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.pilihan-qurban-admin.index', [
            'pilihan_qurbans' => $pilihan_qurbans,
        ])->layout('layouts.admin');
    }
}
