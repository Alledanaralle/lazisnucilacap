<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;



// #[Lazy]

class Edit extends Component
{
    public $isOpen = false;

    public int $id_user = 0;


    public function placeholder()
    {
        return <<<BLADE
    <button 
        class="bg-white text-white font-semibold py-1 px-3 rounded  cursor-not-allowed" 
        disabled
    >
        Edit
    </button>
    BLADE;
    }
    

    public function render()
    {

        return view('livewire.user.edit');
    }
}
