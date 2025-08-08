<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\On;
use Livewire\WithPagination;



class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $landing = Kategori::find($id);
        if ($landing) {
            if ($landing->image) {
                \Storage::disk('public')->delete($landing->image);
            }

            $landing->delete();
            session()->flash('swal', ['type' => 'success', 'title' => 'Success', 'text' => 'Kategori deleted Successfully.']);
            return redirect()->to(url()->previous());
            
        }
    }

    #[On('kategoriCreated')]
    public function handleberitaCreated()
    {
            $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Kategori created Successfully']);
    }
    #[On('kategoriUpdated')]

    public function handleberitaUpdated()
    {
            $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Kategori updated Successfully']);
    }
    public function render()
    {
        $kategori = kategori::paginate(10);
        return view('livewire.kategori.index',[
            'kategoris' => $kategori
        ])->layout('layouts.admin');
    }
}
