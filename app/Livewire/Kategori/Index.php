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
            session()->flash('message', 'Kategori deleted Successfully.');
            return redirect()->to(url()->previous());
        }
    }

    #[On('kategoriCreated')]
    public function handleberitaCreated()
    {
            session()->flash('message', 'Kategori created Successfully');
    }
    #[On('kategoriUpdated')]

    public function handleberitaUpdated()
    {
            session()->flash('message', 'Kategori updated Successfully');
    }
    public function render()
    {
        $kategori = kategori::paginate(10);
        return view('livewire.kategori.index',[
            'kategoris' => $kategori
        ])->layout('layouts.admin');
    }
}
