<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

trait NotificationMessage
{
    public function sendNotification($data, $device)
    {

        try {
            // echo "start";
            $json_data =$data;

            //FCM API end-point
            $url = 'https://fcm.googleapis.com/fcm/send';

            // $auth_key = 'AAAANRLAKQ4:APA91bF3__gEtfa5LFBM1xCQz6-Prg5Ax6LMLrWdwNFlpOKuC345UsQ3uVbOpJlVzsCrCvRq9yb-8jtsMge044UF193TFQnihekL06DmMMpVexJSu28RZbaJ9P2OzFwL8sJrB0e5KhWV';
            if ($device == 1) {
                $auth_key = 'AAAAR_-7KSg:APA91bF0egunQB04T86kh7aZ3TDThAFz83X8vsufgkj4O_FNC2FO826aDVDKDgYHW6xmlaQfwlRDTShKEnpAM49OpsxSn0jPC9TdZjC2zS-czPBB3OL4lBSmy45vFYNCdGgozjg_AAmB';
                // pls use this ';
            } else {
                $auth_key = 'AAAAR_-7KSg:APA91bF0egunQB04T86kh7aZ3TDThAFz83X8vsufgkj4O_FNC2FO826aDVDKDgYHW6xmlaQfwlRDTShKEnpAM49OpsxSn0jPC9TdZjC2zS-czPBB3OL4lBSmy45vFYNCdGgozjg_AAmB';
                // 'pls use this ';
            }

            // dd($json_data);
//            dd($device);
            //header with content_type api key
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $auth_key
            );

            //CURL request to route notification to FCM connection server (provided by Google)
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

            $result = curl_exec($ch);
            curl_close($ch);
            if ($result === FALSE) {
                return 0; //curl_error($ch);
            } else {
                $response = json_decode($result);
                // dd($result,"sss");
                return 1; // $result .'-'. $result->success;
            }
            // echo "end";
        } catch (\Exception $e) {

            // dd($e);
            Log::info($e->getMessage());
        }


    }
}
