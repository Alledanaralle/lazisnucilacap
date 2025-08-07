<?php

namespace App\Livewire\PilihanInfaqAdmin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\pilihan_infaq;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    #[On('pilihan_infaqUpdated')]
    public function handlepilihan_infaqEdited()
    {
        // session()->flash('message', 'pilihan_infaq Updated Successfully');
        $this->dispatch('created', ['message' => 'pilihan infaq Updated Successfully']);

    }

    public function destroy($id)
    {
        $pilihan_infaq = pilihan_infaq::find($id);
        // Hapus data pilihan_infaq
        $pilihan_infaq->delete();
        session()->flash('message', 'Pilihan Infaq Deleted Successfully.');
        return redirect()->to(url()->previous());


    }

    #[On('pilihan_infaqCreated')]
    public function handlepilihan_infaqCreated()
    {
        // session()->flash('message', 'pilihan_infaq Created Successfully');
        $this->dispatch('created', ['message' => 'pilihan infaq Created Successfully']);

    }

    public function render()
    {
        $pilihan_infaqs = pilihan_infaq::query()
            ->where('pil_infaq', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.pilihan-infaq-admin.index', [
            'pilihan_infaqs' => $pilihan_infaqs,
        ])->layout('layouts.admin');
    }
}
