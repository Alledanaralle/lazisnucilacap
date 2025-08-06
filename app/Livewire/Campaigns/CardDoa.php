<?php

namespace App\Livewire\Campaigns;

use App\Models\Like;
use Livewire\Component;
use App\Models\Doa;
use App\Models\User;
use Request;
use Auth;

class CardDoa extends Component
{
    public Doa $doa;
    public $pendoa;
    public $liked = false;

        public function mount($id_doa)
        {
            $this->doa = Doa::find($id_doa);
            if ($this->doa->username == null) {
                $this->doa->username = 'Hamba Allah';
            }
            $user = Auth::user();
            $userId = $user->id_user ?? null;
            $ipAddress = request()->ip();

            if ($user) {
                if (Like::where('id_user', $userId)->where('id_doa', $id_doa)->exists()) {
                    $this->liked = true;
                } else {
                    $this->liked = false;
                }
            }elseif ($user == null) {
                if (Like::where('ip_address', $ipAddress)->where('id_doa', $id_doa)->exists()) {
                    $this->liked = true;
                }
            }
            sleep(1); //delay supaya frontend tidak bentrok
            Doa::updateLike();
        }
    public function like($id_doa)
    {
        $this->liked = !$this->liked;
        $this->dispatch('processLike', $this->prosesLike($id_doa));
        
        Doa::updateLike();
        $this->mount($id_doa);

    }
    public function prosesLike($id_doa){
        $user = Auth::user();
        $userId = $user->id_user ?? null;
        $ipAddress = request()->ip();

        if($user){
            if ($user && Like::where('id_user', $userId)->where('id_doa', $id_doa)->exists()) {
                Like::where('id_user', $userId)->where('id_doa', $id_doa)->delete();
            } else {
                Like::create([
                    'id_user' => $userId,
                    'id_doa' => $id_doa,
                    'ip_address' => $ipAddress,
                ]);
            }
        }elseif($user == null){
            if(Like::where('ip_address', $ipAddress)->where('id_doa', $id_doa)->exists()) {
                Like::where('ip_address', $ipAddress)->where('id_doa', $id_doa)->delete();
            }else{
                Like::create([
                    'id_doa' => $id_doa,
                    'ip_address' => $ipAddress,
                ]);
            }
        }   
    }

    public function render()
    {
        return view('livewire.campaigns.card-doa', [
        ]);
    }
}
