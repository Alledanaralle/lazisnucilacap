<?php

namespace App\Livewire\Ziwaf\Zakat;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\ziwaf;
use App\Models\detail_fitrah;

class ZakatBayar extends Component
{
    public $zakat = [
        'nominal' => 0,
        'jenis1' => '',
        'jenis2' => '',
        'jenis3' => '',
        'atasNama' => '',
    ];
    public $muzakki = [
        'namaMuzakki'=> [],
        'jumlah' => '',
        'zakatFitrah' => 0,
    ];
    public $jumlah;
    public $namaMuzakki;
    public $zakatFitrah;
    public $datazakat;
    public $datafitrah;
    public $nominal;
    public $jenis1;
    public $jenis2;
    public $jenis3;
    public $atasNama;
    public $zakatUang;
    public $zakatJasa;
    public $zakatDagang;
    public $users;
    public $nama;
    public $no;
    public $email;
    public $alamat;
    public $transaction;
    public $jenisPerusahaan;


    public function rules()
    {
        return [
            'email' => 'nullable|email|regex:/@gmail\.com$/',
            'nama' => 'required|string',
            'no' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'Email harus berupa @gmail.com',
            'nama.required' => 'Nama wajib diisi.',
            'no.required' => 'Nomor telepon wajib diisi.',
        ];
    }

    public function mount()
    {
        $this->reset();
        $zakat = session('zakat', null);
        $muzakki = session('muzakki', null);
        // dd($zakat,$muzakki);

        if ($zakat !== null) {
            $this->nominal = $zakat['nominal'];
            $this->jenis1 = $zakat['jenis1'];
            $this->jenis2 = $zakat['jenis2'];
            $this->jenis3 = $zakat['jenis3'];
            $this->jenisPerusahaan = $zakat['jenisPerusahaan'] ?? null;
            $this->atasNama = $zakat['atasNama'];
        }elseif ($muzakki !== null) {
            $this->namaMuzakki = $muzakki['namaMuzakki'];
            $this->jumlah = $muzakki['jumlah'];
            $this->zakatFitrah = $muzakki['zakatFitrah'];
            $this->jenis1 = $muzakki['jenis1'];
        } else {
            return redirect()->route('zakat');
        }
        // dd($this->zakat, $this->muzakki);
        

        
        $this->users = auth::user();
        if ($this->users)
        {
            $this->nama = $this->users->username;
            $this->no = $this->users->no_telp;
            $this->email = $this->users->email ?? null;
        }


    }

    public function login()
    {
        $this->zakat = [
            'nominal' => $this->nominal,
            'jenis1' => $this->jenis1,
            'jenis2' => $this->jenis2,
            'jenis3' => $this->jenis3,
            'atasNama' => $this->atasNama,

        ];

        $this->muzakki = [
            'namaMuzakki' => $this->namaMuzakki,
            'jumlah' => $this->jumlah,
            'zakatFitrah' => $this->zakatFitrah,
        ];
        // dd($this->muzakki);
        return redirect()->route('login')
            ->with([
                    'zakat' => $this->zakat,
                    'muzakki' => $this->muzakki
                ]);
    }

    public function datadiri()
    {
        $this->nama;
        $this->no;
        $this->validateOnly('email');
    }

    public function co()
    {
        $this->validate();
        $order_id = rand();

        if ($this->zakatFitrah)
        {
            $this->nominal = $this->zakatFitrah;
            $this->atasNama = implode(', ', $this->namaMuzakki);
        }

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
                'finish' => route('zakat'),
                'unfinish' => route('zakat'),
                'error' => route('zakat'),
            ]
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->redirectUrl = "https://app.sandbox.midtrans.com/snap/v2/vtweb/{$snapToken}";

        $this->transaction->snap_token = $snapToken;
        $this->transaction->save();

        $ziwaf = Ziwaf::create([
            'nominal' => $this->nominal,
            'atas_nama'=> $this->atasNama,
            'username' => $this->nama,
            'no_telp' => $this->no,
            'id_transaction' => $this->transaction->id_transaction,
            'jenis_ziwaf' => 'Zakat' . ' ' . $this->jenis1 . ' ' . $this->jenis2 . ' ' . '(' . $this->jenis3 . ')',
            'email' => $this->email,
            'alamat' => $this->alamat,
        ]);

        if ($this->namaMuzakki)
        {
            foreach ($this->namaMuzakki as $nama) {
                detail_fitrah::create([
                    'id_ziwaf' => $ziwaf->id_ziwaf,
                    'nama_muzakki' => $nama,
                ]);
            }   
        }else
        {

        }
        
        if ($this->zakatFitrah)
        {
            $this->datafitrah = [
                'zakatFitrah' => $this->zakatFitrah,
                'namaMuzakki' => $this->namaMuzakki,
                'jumlah' => $this->jumlah,
                'nama' => $this->nama,
                'no' => $this->no,
                'email' => $this->email,
                'alamat' => $this->alamat,

            ];
        }else{
            $this->datazakat = [
                'nominal' => $this->nominal,
                'jenis1' => $this->jenis1,
                'jenis2' => $this->jenis2,
                'jenis3' => $this->jenis3,
                'atasNama' => $this->atasNama,
                'nama' => $this->nama ,
                'no' => $this->no,
                'email' => $this->email,
                'alamat' => $this->alamat,
    
            ];
        }

        return redirect()->route('zakat.pembayaran',['token' => $snapToken])
            ->with([
                'datazakat' => $this->datazakat,
                'datafitrah' => $this->datafitrah
            ]);
    }

    public function render()
    {
        return view('livewire.ziwaf.zakat.zakat-bayar')->layout('layouts.none');
    }
}
