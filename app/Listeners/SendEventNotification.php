<?php

namespace App\Listeners;

use App\Events\EventNotification;
use App\Models\Notification;
use App\Models\UserFcm;
use App\Traits\NotificationMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendEventNotification
{
    use NotificationMessage;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventNotification  $event
     * @return void
     */
    public function handle(EventNotification $event)
    {

        try {

            $org_id = $event->user->id;
            $message = $event->data;
            $userFcmRecords =  UserFcm::where("org_id",$org_id)->groupBy("fcm")->get();


            foreach($userFcmRecords as $userFcmRecord) {

                $insert_notification = Notification::create(
                    [
                        'org_id' => $org_id,
                        'notification_token_id' => $userFcmRecord->fcm,
                        'fcm_token' => $userFcmRecord->fcm,
                        'is_important' => '1'
                    ]
                );
                $data = array(
                    "to" => $userFcmRecord->fcm,
                    "notification" => [
                        "body" => $message->message,
                        "title" => $message->title,
                        "data" =>  [
                            "notification_id" => $insert_notification->id,
                        ]
                    ]
                );
                Notification::where('id', $insert_notification->id)->update(['response_data' => serialize($data)]);
                $this->sendNotification(json_encode($data), 1);
            }
        }catch(\Exception $e) {
            Log::error($e);
        }
    }
}
