<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Auth;
use Livewire\Attributes\On;


class Index extends Component
{



    #[On('postUpdated')]
    public function handlePostEdited()
    {
        $this->dispatch('swal:fire', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'User Updated Successfully',
        ]);
    }

    public function destroy($id_user)
    {
        $user = User::find($id_user);
        if ($user) {
            $user->delete();
            session()->flash('swal', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'User Deleted Successfully.',
            ]);
            return redirect()->to(url()->previous());
            
        }


    }

    #[On('postCreated')]
    public function handlePostCreated()
    {
        $this->dispatch('swal:fire', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'User Created Successfully',
        ]);
    }

    public function render()
    {


        return view('livewire.user.index', [
            $this->users = User::query()
                ->orderByRaw("CASE WHEN role = 'admin' THEN 0 ELSE 1 END")
                ->latest()
                ->paginate(10),
            'users' => $this->users

        ])->layout('layouts.admin');

    }

}
