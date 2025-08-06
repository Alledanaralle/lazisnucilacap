<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Transaction as TransactionModel;
use App\Models\Donasi;
use App\Models\ziwaf;
use App\Models\Campaign;
class Transaction extends Component
{

    public function mount(){
        $user = Auth::user();
    
        $this->username = $user->username;
    
        $this->user = User::find($this->username);
    
        $this->transactions = TransactionModel::where('username', $this->username)
        ->whereNotNull('snap_token')
        ->latest()
        ->get();
            
        foreach ($this->transactions as $transaction) {
            $donasi = Donasi::where('id_transaction', $transaction->id_transaction)->first();
            $ziwaf = ziwaf::where('id_transaction', $transaction->id_transaction)->first();
        
            if ($donasi) {
                $campaign = Campaign::where('id_campaign', $donasi->id_campaign)->first();
                $transaction->jenis = 'Donasi';
                $transaction->title = $campaign->title;
                // $transaction->save(); 
            } elseif ($ziwaf) {
                
                $transaction->jenis = $ziwaf->jenis_ziwaf;

            }
        }
        
        

    }
    public function render()
    {
        return view('livewire.profile.transaction',[
            'transactions' => $this->transactions,

        ])->layout('layouts.mobile');
    }
}
