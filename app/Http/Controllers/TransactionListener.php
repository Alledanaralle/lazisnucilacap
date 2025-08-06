<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\NotificationController;
use App\Models\Donasi;
use App\Models\ziwaf;
use App\Models\Campaign;
use App\Models\Notification;


class TransactionListener extends Controller
{
    public function handleNotification(Request $request)
    {
        // $serverKey = env('MIDTRANS_SERVER_KEY');
        $serverKey = '123123123';//fake 
        $signatureKey = $request->signature_key;
        $orderId = $request->order_id;
        $grossAmount = $request->gross_amount;

        $hashed = hash("sha512", $serverKey . $orderId . $grossAmount);

        if ($hashed == $signatureKey) {
            $transaction = Transaction::where('snap_token', $request->transaction_id)->first();

            if ($transaction) {
                switch ($request->transaction_status) {
                    case 'capture':
                        $transaction->status = 'success';
                        $transaction->payment_type = $request->payment_type ?? null;
                        $transaction->va_number = $request->va_number ?? null;
                        $transaction->settlement_time = $request->transaction_time;
                        if ($request->bank) {
                            $transaction->bank_or_store = $request->bank;
                        } elseif ($request->store) {
                            $transaction->bank_or_store = $request->store;
                        } elseif ($request->issuer) {
                            $transaction->bank_or_store = $request->issuer;
                        }
                        $message = 'Transaksi berhasil.';
                        break;

                    case 'deny':
                        $transaction->status = 'failed';
                        $message = 'Transaksi ditolak.';
                        break;

                    case 'challenge':
                        $transaction->status = 'pending';
                        $message = 'Transaksi challenge.';
                        break;

                    default:
                        $transaction->status = 'unknown';
                        $message = 'Terjadi kesalahan pada data transaksi yang dikirim.';
                        break;
                }

                $transaction->save();
                $donasi = Donasi::where('id_transaction', $transaction->id_transaction)->first();
                $ziwaf = ziwaf::where('id_transaction', $transaction->id_transaction)->first();

                if ($donasi) {
                    $campaign = Campaign::where('id_campaign', $donasi->id_campaign)->first();
                    $transaction->jenis = 'Donasi untuk ' . $campaign->title;
                } elseif ($ziwaf) {
                    $transaction->jenis = $ziwaf->jenis_ziwaf;

                }


                $pesan = 'Assalamualaikum 
Alhamdulillah, terima kasih dan kami terima atas '.$transaction->jenis.' atas nama '.strtoupper($transaction->username).' sebesar Rp '.number_format($transaction->nominal, 0, ',', '.').' Pada tanggal ' .  date('Y-m-d', strtotime($transaction->settlement_time)).'
Insya Allah, '.$transaction->jenis.' Anda akan kami salurkan sesuai amanah dan ketentuan syariah.

Semoga Allah SWT melimpahkan pahala terhadap harta yang telah Anda titipkan, dan semoga menjadi pembuka rahmat, kasih sayang, juga rezeki dunia-akhirat yang luas. 

ﺁﺟَﺮَﻙ ﺍﻟﻠﻪُ ﻓِﻴْﻤَﺎ ﺍَﻋْﻄَﻴْﺖَ، ﻭَﺑَﺎﺭَﻙَ ﻓِﻴْﻤَﺎ ﺍَﺑْﻘَﻴْﺖَ ﻭَﺟَﻌَﻠَﻪُ ﻟَﻚَ ﻃَﻬُﻮْﺭًﺍ
Aamiin..

Aamiin yaa Rabbal ‘alamin.

Salam,

Nucare Lazisnu Cilacap🙏🙏😇';

                $notifController = new NotificationController();
                $notification_response = $notifController->sendNotif($transaction->no_telp, $pesan);

                if($notification_response['status'] == 'success'){
                    $status = 'success';
                }else{
                    $status = $notification_response['message'];
                }
                Notification::create([
                    'id_transaction' => $transaction->id_transaction,
                    'pesan' => $pesan,
                    'response' => $status,
                    'no_telp' => $transaction->no_telp
                ]);

                return response()->json([
                    'message' => $message,
                    'notification_response' => $notification_response,
                    'transaction_status' => $request->transaction_status,
                    'order_id' => $request->order_id,
                    'details' => $request->all()
                ], 200);
            }
        }

        // return response()->json(['message' => 'Invalid notification signature'], 400);
        return response()->json(['message' =>  $hashed], 400);//temp
    }


}
