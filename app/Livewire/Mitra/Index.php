<?php

namespace App\Livewire\Mitra;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Mitra;



class Index extends Component
{
    public $search = '';

    #[On('mitraUpdated')]
    public function handlemitraEdited()
    {
            $this->dispatch('updated', ['message' => 'mitra Updated Successfully']);
        // session()->flash('message', 'mitra Updated Successfully ');

    }

    public function destroy($id_partner)
    {
        $mitra = mitra::find($id_partner);
        if ($mitra) {
            // Hapus gambar terkait jika ada
            if ($mitra->logo) {
                \Storage::disk('public')->delete($mitra->logo);
            }

            // Hapus data mitra
            $mitra->delete();

            // Tampilkan pesan sukses
            $this->dispatch('destroyed', ['message' => 'mitra deleted Successfully']);
            // session()->flash('message', 'mitra destroyed successfully.');

        }
    }


    #[On('mitraCreated')]
    public function handlemitraCreated()
    {
            $this->dispatch('created', ['message' => 'mitra created Successfully']);
        // session()->flash('message', 'mitra Created Successfully ');


    }
    public function render()
    {

        $mitras = Mitra::query()
            ->where('partner_name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.mitra.index', [
            'mitras' => $mitras,
        ])->layout('layouts.admin');
    }
}
