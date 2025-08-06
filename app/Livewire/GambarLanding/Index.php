<?php

namespace App\Livewire\GambarLanding;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\gambar_landing;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function destroy($id_gambar)
    {
        $landing = gambar_landing::find($id_gambar);
        if ($landing) {
            // Hapus gambar terkait jika ada
            if ($landing->gambar) {
                \Storage::disk('public')->delete($landing->gambar);
            }

            // Hapus data berita
            $landing->delete();
            gambar_landing::reorder();

            // Tampilkan pesan sukses
            $this->dispatch('destroyed', ['message' => 'Gambar Landing deleted Successfully']);
            // session()->flash('message', 'Gambar Landing destroyed successfully.');
        }
    }

    #[On('gambarCreated')]
    public function handleberitaCreated()
    {
            $this->dispatch('created', ['message' => 'Gambar Landing created Successfully']);
        // session()->flash('message', 'Gambar Landing Created Successfully');
    }
    #[On('gambarUpdated')]

    public function handleberitaUpdated()
    {
            $this->dispatch('updated', ['message' => 'Gambar Landing updated Successfully']);
        // session()->flash('message', 'Gambar Landing Created Successfully');
    }

    public function moveUp($id_gambar)
    {
        $currentPosition = gambar_landing::find($id_gambar);


        if ($currentPosition->position == 1) {
            return;
        }


        $previousPosition = gambar_landing::where('position', $currentPosition->position - 1)->first();
        $tempPosition = $currentPosition->position;
        $previousPosition->update(['position' => 100]);
        $currentPosition->update(['position' => $currentPosition->position - 1]);
        $previousPosition->update(['position' => $tempPosition]);

    }

    public function moveDown($id_gambar)
    {
        $currentPosition = gambar_landing::find($id_gambar);
        $maxposition = gambar_landing::max('position');

        if ($currentPosition->position == $maxposition) {
            return;
        }

        $nextPosition = gambar_landing::where('position', $currentPosition->position + 1)->first();
        $tempPosition = $currentPosition->position;
        $nextPosition->update(['position' => 100]);
        $currentPosition->update(['position' => $currentPosition->position + 1]);
        $nextPosition->update(['position' => $tempPosition]);
    }

    public function render()
    {
        // Ambil data dari model gambar_landing
        // $landings = gambar_landing::paginate(10);
        gambar_landing::reorder();

        $landings = gambar_landing::orderBy('position', 'asc')->get(); // position by 'position'
        $maxPosition = gambar_landing::max('position');

        // Kembalikan view dengan data yang dibutuhkan
        return view('livewire.gambar-landing.index', [
            'landings' => $landings,
            'maxPosition' => $maxPosition,

        ])->layout('layouts.admin');
    }
}
