<?php

namespace App\Livewire\Donasi;

use App\Models\Donasi;
use App\Models\Doa;
use Livewire\Component;
use App\Models\Campaign;
use Auth;
use Livewire\Attributes\Rule;
use App\Models\Transaction;

class Donatur extends Component
{
    public Campaign $campaign;
    public $nominal;
    public $min_donation;

    public $username;
    public $no_telp;
    public $email;
    public $doa;
    public $alamat;
    public $toggleValue = false;
    public $donatur;
    public $formattedDisplay;

    public function rules()
    {
        return [
            'username' => 'required|string',
            'no_telp' => 'required|string|regex:/^[0-9]+$/',
            'email' => 'nullable|email|regex:/@gmail\.com$/',
            'doa' => 'nullable|string',
            'alamat' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Nama pengguna wajib diisi.',
            'username.string' => 'Nama pengguna harus berupa teks.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.integer' => 'Nomor telepon harus berupa angka.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'email.regex' => 'Email harus berupa @gmail.com',

        ];
    }

    public function mount($title, $nominal = null)
    {

        $decodedTitle = urldecode($title);

        $this->campaign = Campaign::where('title', $decodedTitle)->firstOrFail();

        $this->nominal = $nominal ?? session('nominal', 'none');
        if ($this->nominal !== 'none') {
            $this->nominal = ceil($this->nominal / 1000) * 1000;
            $this->formattedDisplay = number_format($this->nominal, 0, ',', '.');
        }
        
        $user = Auth::user();
        if ($user) {
            $this->username = $user->username;
            $this->no_telp = $user->no_telp;
            $this->email = $user->email;
        }

        $this->goBack();
    }

    public function pembayaran()
    {
        if ($this->email == '') {
            $this->email = null;
        }
        $this->validate();
        $user = Auth::user();

        $hide_name = $this->toggleValue ? 'yes' : 'no';

        $this->donatur = [
            'username' => $this->username,
            'nominal' => $this->nominal,
            'no_telp' => $this->no_telp,
            'email' => $this->email,
            'doa' => $this->doa,
            'hide_name' => $hide_name,
        ];

        $order_id = rand();

        $this->transaction = Transaction::create([
            'nominal' => $this->nominal,
            'status' => 'pending',
            'order_id' => $order_id,
            'snap_token' => null,
            'username' => $this->username,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'email' => $this->email,
            'id_user' => $user->id_user ?? null,
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
                'username' => $this->username,
                'email' => $this->email ?? null,
                'no_telp' => $this->no_telp,
            ),
            'callbacks' => [
                'finish' => route('donasi.success', ['title' => urlencode($this->campaign->title)]),
                'unfinish' => route('zakat'),
                'error' => route('wakaf'),
            ]
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->redirectUrl = "https://app.sandbox.midtrans.com/snap/v2/vtweb/{$snapToken}";

        $this->transaction->snap_token = $snapToken;
        $this->transaction->save();


        $donasi = Donasi::create([
            'email' => $this->email ?? null,
            'id_user' => $user->id_user ?? null,
            'jumlah_donasi' => $this->nominal,
            'id_campaign' => $this->campaign->id_campaign,
            'username' => $this->username,
            'no_telp' => $this->no_telp,
            'hide_name' => $hide_name,
            'alamat' => $this->alamat,
            'id_transaction' => $this->transaction->id_transaction
        ]);
        if ($this->doa) {
            Doa::create([
                'username' => $this->username,
                'id_user' => $user->id_user ?? null,
                'doa' => $this->doa,
                'jumlah_likes' => 0,
                'id_campaign' => $this->campaign->id_campaign,
                'id_transaction' => $this->transaction->id_transaction
            ]);
        }


        return redirect()->route('donasi.pembayaran', ['title' => urlencode($this->campaign->title), 'token' => $snapToken])
            ->with('donatur', $this->donatur);
    }

    public function goBack()
    {
        if ($this->nominal == 'none') {
            return redirect()->route('donasi.index', ['title' => urlencode($this->campaign->title)]);
        }
    }

    public function render()
    {
        return view('livewire.donasi.donatur')->layout('layouts.none');
    }
}
