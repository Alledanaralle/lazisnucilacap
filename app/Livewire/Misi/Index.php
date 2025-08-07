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
        session()->flash('message', 'Misi Updated Successfully');
        // session()->flash('message', 'misi Updated Successfully ');

    }

    public function destroy($id_misi)
    {
        $Misi = misi::find($id_misi);

        // Hapus data misi
        $Misi->delete();
        misi::reorder();
        session()->flash('message', 'Misi deleted Successfully.');
        return redirect()->to(url()->previous());
        // session()->flash('message', 'misi destroyed successfully.');

    }


    #[On('misiCreated')]
    public function handlemisiCreated()
    {
        session()->flash('message', 'Misi created Successfully');
        // session()->flash('message', 'misi Created Successfully ');


    }
    #[On('misiUpdated')]
    public function handlemisiUpdated()
    {
        $this->dispatch('updated', ['message' => 'misi updated Successfully']);
        // session()->flash('message', 'misi Created Successfully ');


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
