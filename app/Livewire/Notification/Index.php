<?php

namespace App\Livewire\Notification;

use Livewire\Component;
use App\Models\Notification;
use App\Http\Controllers\NotificationController;

class Index extends Component
{

    public function send($id)
    {
        $notification = Notification::find($id);
        $notifController = new NotificationController();
        $notification_response = $notifController->sendNotif($notification->no_telp, $notification->pesan);

        if ($notification_response['status'] == 'success') {
            $status = 'success';
            $event = 'updated';
        } else {
            $status = $notification_response['message'];
            $event = 'destroyed';
        }

        $notification->update([
            'response' => $status
        ]);
        $this->dispatch($event, ['message' => $status]);
    }
    public function render()
    {
        return view('livewire.notification.index',[
            $notifications = Notification::query()
            ->latest()
            ->paginate(10),
            'notifications' => $notifications,

        ])->layout('layouts.admin');
    }
}
