<?php

namespace App\Livewire\AdminDonasi;

use Livewire\Component;
use App\Models\Donasi;
use Livewire\Attributes\On;

class Index extends Component
{
    
    #[On('postUpdated')]
    public function handlePostEdited()
    {
        // session()->flash('message', 'donasi Updated Successfully ');
        $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Donasi Updated Successfully']);


    }

    public function destroy($id_donasi)
    {
        $donasi = Donasi::find($id_donasi);
        if ($donasi) {
            $donasi->delete();
        session()->flash('swal', ['type' => 'success', 'title' => 'Success', 'text' => 'Donasi Deleted Successfully.']);
        return redirect()->to(url()->previous());
            

        }
        // session()->flash('message', 'donasi Destroyed Successfully ');


    }

    #[On('postCreated')]
    public function handlePostCreated()
    {
        // session()->flash('message', 'donasi Created Successfully ');
        $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Donasi Created Successfully']);


    }


    public function render()
    {
        return view('livewire.admin-donasi.index',[
            $this->donasis = Donasi::query()
            ->latest()
            ->paginate(10),
        'donasis' => $this->donasis
        ])->layout('layouts.admin');
    }
}
