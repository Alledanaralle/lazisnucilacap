<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule;


class Create extends Component
{
    #[Rule(['required','string'])]
    public string $username = "";
    #[Rule(['required','string'])]
    public string $first_name = "";
    #[Rule(['required','string'])]
    public string $last_name = "";
    #[Rule(['required','string'])]
    public $role = 'admin'; // Default role set to 'admin'
    #[Rule(['required','string'])]
    public string $no_telp = "";
    #[Rule(['required','string'])]
    public string $password = "";
    #[Rule(['required','string'])]
    public string $alamat = "";

    public function save(){
        $validatedData = $this->validate();
        $user = User::create([
            'username' => $validatedData['username'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'role' => $validatedData['role'],
            'no_telp' => $validatedData['no_telp'],
            'password' => bcrypt($validatedData['password']),
            'alamat' => $validatedData['alamat']
        ]);
        
        // dd($user);
        $this->reset();
        

        $this->dispatch('postCreated');
    }
    public function render()
    {
        return view('livewire.user.create');
    }
}
