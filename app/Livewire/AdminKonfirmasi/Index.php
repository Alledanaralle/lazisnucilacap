<?php

namespace App\Livewire\AdminKonfirmasi;

use Livewire\Component;
use App\Models\konfirmasi;

class Index extends Component
{
    public $search = '';

    public function destroy($id_konfirmasi)
    {
        $konfirmasi = konfirmasi::find($id_konfirmasi);
        if ($konfirmasi) {
            // Hapus gambar terkait jika ada
            if ($konfirmasi->bukti) {
                \Storage::disk('public')->delete($konfirmasi->bukti);
            }
            
            // Hapus data konfirmasi
            $konfirmasi->delete();
            $this->dispatch('destroyed', ['message' => 'Konfirmasi deleted Successfully']);

            // Tampilkan pesan sukses
            // session()->flash('message', 'Konfirmasi Sukses Dihapus.');

        }
    }

    public function render()
    {
        $konfirmasis = konfirmasi::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('no_telp', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('campaign', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(5);
            foreach ($konfirmasis as $konfirmasi) {
                $konfirmasi->title = $konfirmasi->campaign->title;
            }
            

        return view('livewire.admin-konfirmasi.index', [
            'konfirmasis' => $konfirmasis,
        ])->layout('layouts.admin');
    }
}
