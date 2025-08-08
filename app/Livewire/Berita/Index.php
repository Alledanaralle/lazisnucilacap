<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Berita;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    #[On('beritaUpdated')]
    public function handleberitaEdited()
    {
        // session()->flash('message', 'Berita Updated Successfully');
        $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Berita Updated Successfully']);

    }

    public function destroy($id_berita)
    {
        $berita = Berita::find($id_berita);
        if ($berita) {
            // Hapus gambar terkait jika ada
            if ($berita->picture) {
                \Storage::disk('public')->delete($berita->picture);
            }

            // Hapus data berita
            $berita->delete();
            session()->flash('swal', ['type' => 'success', 'title' => 'Success', 'text' => 'Berita Deleted Successfully.']);
            return redirect()->to(url()->previous());
            


        }
    }

    #[On('beritaCreated')]
    public function handleberitaCreated()
    {
        // session()->flash('message', 'Berita Created Successfully');
        $this->dispatch('swal:fire', ['type' => 'success', 'title' => 'Success', 'text' => 'Berita Created Successfully']);

    }

    public function render()
    {
        $beritas = Berita::query()
            ->where('title_berita', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('tanggal', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.berita.index', [
            'beritas' => $beritas,
        ])->layout('layouts.admin');
    }
}
