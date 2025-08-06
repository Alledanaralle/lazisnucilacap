<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class NotificationController extends Controller
{
    public function sendNotif($nomor, $pesan)
    {
        try {
            $key = env('WHATSAPP_API_KEY');
            $url = "https://wa.nucarecilacap.id/api/send.php?key=$key";
            $post = [  
               'nomor' => $nomor,
                'msg' => $pesan
            ];
            $post = json_encode($post);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 300);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $response = curl_exec($ch);
    
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
    
            $decoded = json_decode($response, true);
            curl_close($ch);
    
            // Ensure we are always returning an array
            if (isset($decoded["status"]) && $decoded['status']) {
                return [
                    'status' => 'success',
                    'message' => null,
                ];
            } else {
                if (isset($decoded['message'])) {
                    if ($decoded['message'] == 'The number is not registered') {
                        return [
                            'status' => 'error',
                            'message' => 'Nomor HP tidak terdaftar Whatsapp'
                        ];
                    } else if ($decoded['message'] == 'Session not found.') {
                        return [
                            'status' => 'error',
                            'message' => 'Notifikasi WA sedang sibuk, coba kirim ulang lagi nanti'
                        ];
                    }
                }
                // Default case for unexpected responses
                return [
                    'status' => 'error',
                    'message' => 'Unknown error occurred'
                ];
            }
            
        } catch (\Exception $e) {
            // Return exception message in array format
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
