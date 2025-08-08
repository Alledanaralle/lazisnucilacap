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
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Mitra Updated Successfully',
        ]);
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
            session()->flash('swal', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Mitra deleted Successfully.',
            ]);
            return redirect()->to(url()->previous());
            

        }
    }


    #[On('mitraCreated')]
    public function handlemitraCreated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'Mitra created Successfully',
        ]);
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
