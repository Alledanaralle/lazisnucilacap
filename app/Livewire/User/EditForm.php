<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule;
use App\Livewire\User\Edit;
use Livewire\Attributes\Lazy;

class EditForm extends Component
{

    public int $id_user;
    #[Rule(['required', 'string'])]
    public string $username = "";
    #[Rule(['required', 'string'])]
    public string $first_name = "";
    #[Rule(['required', 'string'])]
    public string $last_name = "";
    #[Rule(['required', 'string'])]
    public string $role = "";
    #[Rule(['required', 'string'])]
    public string $no_telp = "";
    #[Rule(['required', 'string'])]
    public string $password = "";
    #[Rule(['required', 'string'])]
    public string $alamat = "";

    public function clear($id_user)
    {
        $this->dispatch('refreshComponent');
        $user = User::find($id_user);
        if ($user) {
            $this->id_user = $user->id_user;
            $this->username = $user->username;
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->role = $user->role;
            $this->no_telp = $user->no_telp;
            $this->password = $user->password;
            $this->alamat = $user->alamat;
        }
        
    }
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function placeholder()
    {
        return <<<'BLADE'
        <div>
            <h5 class="card-title placeholder-glow">
                <span class="placeholder col-4"></span>
            </h5>
            <p class="card-text placeholder-glow">
                <span class="placeholder col-7"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-6"></span>
                <span class="placeholder col-8"></span>
            </p>
        </div>
        BLADE;
    }
    public function mount($id_user)
    {
        $user = User::find($id_user);
        if ($user) {
            $this->id_user = $user->id_user;
            $this->username = $user->username;
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->role = $user->role;
            $this->no_telp = $user->no_telp;
            $this->password = $user->password;
            $this->alamat = $user->alamat;
        }
        return $user;
    }
    public function update()
    {
        $validatedData = $this->validate();

        $user = User::find($this->id_user);
        if ($user) {

            $user->update([
                'username' => $validatedData['username'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'role' => $validatedData['role'],
                'no_telp' => $validatedData['no_telp'],
                'alamat' => $validatedData['alamat'],
                'password' => bcrypt($validatedData['password']),
            ]);
        }

        $this->clear($this->id_user);
        $this->dispatch('postUpdated');
        return $user;
    }

    public function render()
    {
        
        return view('livewire.user.edit-form');
    }
}
