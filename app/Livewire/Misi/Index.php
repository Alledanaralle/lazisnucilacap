<?php

namespace App\Livewire\Misi;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\misi;

class Index extends Component
{
    #[On('misiUpdated')]
    public function handlemisiEdited()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Misi Updated Successfully',
        ]);
    }

    public function destroy($id_misi)
    {
        $Misi = misi::find($id_misi);

        // Hapus data misi
        $Misi->delete();
        misi::reorder();
        session()->flash('swal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Misi deleted Successfully.',
        ]);
        return redirect()->to(url()->previous());
        

    }


    #[On('misiCreated')]
    public function handlemisiCreated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Misi created Successfully',
        ]);
    }
    #[On('misiUpdated')]
    public function handlemisiUpdated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Misi updated Successfully',
        ]);
    }

    public function moveUp($id_misi)
    {
        $currentMisi = misi::find($id_misi);


        if ($currentMisi->order == 1) {
            return;
        }


        $previousMisi = misi::where('order', $currentMisi->order - 1)->first();
        $tempOrder = $currentMisi->order;
        $previousMisi->update(['order' => 100]);
        $currentMisi->update(['order' => $currentMisi->order - 1]);
        $previousMisi->update(['order' => $tempOrder]);

    }

    public function moveDown($id_misi)
    {
        $currentMisi = misi::find($id_misi);
        $maxOrder = misi::max('order');

        if ($currentMisi->order == $maxOrder) {
            return;
        }

        $nextMisi = misi::where('order', $currentMisi->order + 1)->first();
        $tempOrder = $currentMisi->order;
        $nextMisi->update(['order' => 100]);
        $currentMisi->update(['order' => $currentMisi->order + 1]);
        $nextMisi->update(['order' => $tempOrder]);
    }


    public function render()
    {
        misi::reorder();

        $misis = misi::orderBy('order', 'asc')->get(); // Order by 'order'
        $maxOrder = misi::max('order');

        return view('livewire.misi.index', [
            'misis' => $misis,
            'maxOrder' => $maxOrder,
        ])->layout('layouts.admin');
    }
}
