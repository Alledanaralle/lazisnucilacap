<?php

namespace App\Livewire\LaporanAdmin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\laporan;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function destroy($id)
    {
        $laporan = laporan::find($id);
        if ($laporan) {
            // Hapus file terkait jika ada
            if ($laporan->file) {
                \Storage::disk('public')->delete($laporan->file);
            }

            // Hapus data berita
            $laporan->delete();

            // Tampilkan pesan sukses
            $this->dispatch('destroyed', ['message' => 'file laporan deleted Successfully']);
            // session()->flash('message', 'file laporan destroyed successfully.');
        }
    }

    #[On('fileCreated')]
    public function handleberitaCreated()
    {
        $this->dispatch('created', ['message' => 'file laporan created Successfully']);
        // session()->flash('message', 'file laporan Created Successfully');
    }
    #[On('fileUpdated')]

    public function handleberitaUpdated()
    {
        $this->dispatch('updated', ['message' => 'file laporan updated Successfully']);
        // session()->flash('message', 'file laporan Created Successfully');
    }

    public function render()
    {
        // Ambil data dari model file_laporan
        $laporans = laporan::paginate(10);

        // Kembalikan view dengan data yang dibutuhkan
        return view('livewire.laporan-admin.index', [
            'laporans' => $laporans,
        ])->layout('layouts.admin');
    }
}
