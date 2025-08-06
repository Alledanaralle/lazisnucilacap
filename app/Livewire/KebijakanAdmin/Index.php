<?php

namespace App\Livewire\KebijakanAdmin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\kebijakan;

class Index extends Component
{
    use WithPagination;


    public function destroy($id_kebijakan)
    {
        $Kebijakan = kebijakan::find($id_kebijakan);
        if ($Kebijakan) {
            // Hapus gambar terkait jika ada
            if ($Kebijakan->kebijakan) {
                \Storage::disk('public')->delete($Kebijakan->kebijakan);
            }

            // Hapus data berita
            $Kebijakan->delete();

            // Tampilkan pesan sukses
            $this->dispatch('destroyed', ['message' => 'Kebijakan deleted Successfully']);
            // session()->flash('message', 'Kebijakan destroyed successfully.');
        }
    }

    #[On('kebijakanCreated')]
    public function handleberitaCreated()
    {
            $this->dispatch('created', ['message' => 'Kebijakan created Successfully']);
        // session()->flash('message', 'kebijakan Created Successfully');
    }

    public function render()
    {
        // Ambil data dari model gambar_landing
        $Kebijakans = kebijakan::paginate(10);

        // Kembalikan view dengan data yang dibutuhkan
        return view('livewire.kebijakan-admin.index', [
            'Kebijakans' => $Kebijakans,
        ])->layout('layouts.admin');
    }
}
