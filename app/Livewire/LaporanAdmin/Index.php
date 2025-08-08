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
            session()->flash('swal', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'File Laporan deleted Successfully.',
            ]);
            return redirect()->to(url()->previous());
            
        }
    }

    #[On('fileCreated')]
    public function handleberitaCreated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'File Laporan created Successfully',
        ]);
    }
    #[On('fileUpdated')]

    public function handleberitaUpdated()
    {
        $this->dispatch('swal:success', [
            'title' => 'Success!',
            'text' => 'File Laporan updated Successfully',
        ]);
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
