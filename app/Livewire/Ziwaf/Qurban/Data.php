<?php

namespace App\Livewire\Ziwaf\Qurban;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\ziwaf;

class Data extends Component
{
    public $qurban = [
        'jenis' => '',
        'jumlah' => '',
        'mudhohi' => '',
        'nominal' => 0,
    ];
    public $edit = [
        'jenis' => '',
        'jumlah' => '',
        'mudhohi' => '',
        'nominal' => 0,
        'nama' => '',
        'no' => '',
        'email' => '',
        'alamat' => '',
    ];
    public $dataqurban;
    public $nominal;
    public $jumlah;
    public $mudhohi = [];
    public $jenis;
    public $hewan;
    public $users;
    public $nama;
    public $no;
    public $email;
    public $alamat;
    public $transaction;


    public function rules()
    {
        return [
            'nama' => 'required',
            'no' => 'required',
            'alamat' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'no.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ];
    }

    public function mount()
    {
        $qurban = session('qurban', '');
        $edit = session('edit', '');

        if ($qurban) {
            $this->nominal = $qurban['nominal'];
            $this->jenis = $qurban['jenis'];
            $this->mudhohi = $qurban['mudhohi'];
            $this->jumlah = $qurban['jumlah'];
        } elseif ($edit) {
            $this->nominal = $edit['nominal'];
            $this->jenis = $edit['jenis'];
            $this->mudhohi = $edit['mudhohi'];
            $this->jumlah = $edit['jumlah'];
            $this->nama = $edit['nama'];
            $this->no = $edit['no'];
            $this->email = $edit['email'];
            $this->alamat = $edit['alamat'];
        } else {
            return redirect()->route('qurban');
        }
        

        $this->users = auth::user();
        if ($this->users) {
            $this->nama = $this->users->username;
            $this->no = $this->users->no_telp;
        }


    }

    public function datamudhohi()
    {
        $this->nama;
        $this->no;
        $this->alamat;
    }

    public function login()
    {
        $this->qurban = [
            'nominal' => $this->nominal,
            'jenis' => $this->jenis,
            'mudhohi' => $this->mudhohi,
            'jumlah' => $this->jumlah,

        ];
        // dd($this->qurban);
        return redirect()->route('login')
            ->with('qurban', $this->qurban);
    }

    public function co()
    {
        $this->validate();

        $order_id = rand();

        $this->transaction = Transaction::create([
            'nominal' => $this->nominal,
            'status' => 'pending',
            'order_id' => $order_id,
            'snap_token' => null,
            'username' => $this->nama,
            'no_telp' => $this->no,
            'alamat' => 'temp',
            'email' => $this->email,
        ]);

        // Configure Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $this->nominal,
            ),
            'customer_details' => array(
                'username' => $this->nama,
                'email' => $this->email ?? null,
                'no_telp' => $this->no,
            ),
            'callbacks' => [
                'finish' => route('qurban'),
                'unfinish' => route('qurban.data'),
                'error' => route('landing'),
            ]
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // $this->redirectUrl = "https://app.sandbox.midtrans.com/snap/v2/vtweb/{$snapToken}";

        $this->transaction->snap_token = $snapToken;
        $this->transaction->save();

        Ziwaf::create([
            'nominal' => $this->nominal,
            'atas_nama' => $this->mudhohi,
            'username' => $this->nama,
            'no_telp' => $this->no,
            'id_transaction' => $this->transaction->id_transaction,
            'jenis_ziwaf' => 'Qurban' . ' ' . $this->hewan,
            'email' => $this->email,
            'alamat' => $this->alamat,
        ]);

        $this->dataqurban = [
            'nominal' => $this->nominal,
            'jenis' => $this->jenis,
            'mudhohi' => $this->mudhohi,
            'jumlah' => $this->jumlah,
            'nama' => $this->nama,
            'no' => $this->no,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'hewan' => $this->hewan,
        ];


        return redirect()->route('qurban.checkout', ['token' => $snapToken])
            ->with('dataqurban', $this->dataqurban);
    }

    public function render()
    {
        $mudhohiList = json_decode($this->mudhohi, true);

        return view('livewire.ziwaf.qurban.data',[
            'mudhohiList' => $mudhohiList
            ])->layout('layouts.none');
    }
}
