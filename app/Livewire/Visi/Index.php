<?php

namespace App\Livewire\Visi;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\visi;

class Index extends Component
{
    #[On('visiUpdated')]
    public function handlevisiEdited()
    {
        $this->dispatch('updated', ['message' => 'visi Updated Successfully']);
        // session()->flash('message', 'visi Updated Successfully ');

    }

    public function destroy($id_visi)
    {
        $Visi = visi::find($id_visi);
        $Visi->delete();
        visi::reorder();
        $this->dispatch('destroyed', ['message' => 'visi deleted Successfully']);
        // session()->flash('message', 'visi destroyed successfully.');

    }


    #[On('visiCreated')]
    public function handlevisiCreated()
    {
        $this->dispatch('created', ['message' => 'visi created Successfully']);
        // session()->flash('message', 'visi Created Successfully ');


    }
    public function moveUp($id_visi)
    {
        $currentvisi = visi::find($id_visi);

        if ($currentvisi->order == 1) {
            return;
        }

        $previousvisi = visi::where('order', $currentvisi->order - 1)->first();
        $tempOrder = $currentvisi->order;
        $previousvisi->update(['order' => 100]);
        $currentvisi->update(['order' => $currentvisi->order - 1]);
        $previousvisi->update(['order' => $tempOrder]);

    }

    public function moveDown($id_visi)
    {
        $currentvisi = visi::find($id_visi);
        $maxOrder = visi::max('order');

        if ($currentvisi->order == $maxOrder) {
            return;
        }

        $nextvisi = visi::where('order', $currentvisi->order + 1)->first();
        $tempOrder = $currentvisi->order;
        $nextvisi->update(['order' => 100]);
        $currentvisi->update(['order' => $currentvisi->order + 1]);
        $nextvisi->update(['order' => $tempOrder]);
    }

    public function render()
    {

        $visis = visi::orderBy('order', 'asc')->get();
        $maxOrder = visi::max('order');

        return view('livewire.visi.index', [
            'visis' => $visis,
            'maxOrder' => $maxOrder,
        ])->layout('layouts.admin');
    }
}
