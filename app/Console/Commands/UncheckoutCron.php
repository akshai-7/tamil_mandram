<?php

namespace App\Console\Commands;

use App\AttendanceRecord;
use Illuminate\Console\Command;
use App\StaffPunchRecords;
use App\ScheduledJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Shift;
use App\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UncheckoutCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uncheckout:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $tdate = date('Y-m-d');

        $punch_records = StaffPunchRecords::where('punch_date', $tdate)->groupBy("punch_date")->whereNull('check_out')->get();

        
        
        $CheckOutData = [];

        if (count($punch_records) > 0) {
            foreach ($punch_records as $record) {

                if (!$record->check_out) {

                    $schedule_records = ScheduledJob::where('schedule_date', $tdate)->where('user_id', $record->user_id)->where('company_id', @$record->company_id)->where('shift_id', @$record->shift_id)->first();

                    
                    $curr_time      =  date('H:i');

                    if (!$schedule_records) {
                        $startTime  = explode(":", $record->check_in);
                        $shift_end_time = Carbon::createFromTime($startTime[0], $startTime[1])->addHours(8);
                        $shift_end_time = $shift_end_time->format("H:i");
                        $originalEndtime  = explode(":", $shift_end_time);
                        $autoLogTime1 = Carbon::createFromTime($originalEndtime[0], $originalEndtime[1])->addMinute(15);
                        $autoLogTime = $autoLogTime1->format('H:i');

                    } else {
                        $shift_end_time = @$schedule_records->to_time;
                        $originalEndtime  = explode(":", $shift_end_time);
                        $autoLogTime2 = Carbon::createFromTime($originalEndtime[0], $originalEndtime[1])->addMinute(15);
                        $autoLogTime = $autoLogTime2->format('H:i');
                    }

                    $user = Users::find($record->user_id);
                    $addtionlHrs    = @$record->addtionlHrs();
                    $extra_duty     = @$addtionlHrs->to_time;


                    if($extra_duty) {
                        $originalEndtime  = explode(":", $extra_duty);
                        $autoLogTime3 = Carbon::createFromTime($originalEndtime[0], $originalEndtime[1])->addMinute(15);
                        $autoLogTime = $autoLogTime3->format('H:i');
                    }

                    //auto Auto logout
                    if ($curr_time > $autoLogTime ) {

                        $currentEndTime = date("H:i");


                        $totalWorkedHrs = Shift::diffHrs($record->check_in, $currentEndTime);

                        $record->update(['check_out' => date("H:i"), "total_hours" => $totalWorkedHrs]);
                        //  TotalWorkingTime();
                        $this->TotalWorkingTime($record->user_id, $record->company_id, $record->punch_date,$record->check_in, $currentEndTime);
 
                        $fcm_token = $user->fcm_token;
                        $message = "Your work time exists";
                        $title = "Auto Logout Alert";

                       $this->sendNotification($fcm_token, $message, $title);
                    }

                    if ($shift_end_time && $curr_time > $shift_end_time && !$extra_duty) {

                        $fcm_token =  $user->fcm_token;

                        $message = "Your Work Time is Over. Pls Checkout.";
                        $title = "Logout Alert";
                        $this->sendNotification($fcm_token, $message, $title);
                    } else if ($extra_duty && $curr_time > $extra_duty) {

                        $fcm_token = $user->fcm_token;
                        // $fcm_token =  "fvDudbRzQceGJNZMCilhYa:APA91bFTmEjDWUXZhzcc3p0xubXKq3CaWO8KxYTeVzwkR1apcumvtNhtmG5Yhtl3NFnqb41cu4N1rpe3bzRD6aMjRxPVvBOrwFX43Fa29U9jLtS7xFj6SGqzhEBgmV2xDluSpJx7sQsx";
                        $message = "Your Work Time is Over. Pls Checkout.";
                        $title = "Logout Alert";
                        $this->sendNotification($fcm_token, $message, $title);
                    } else if ($extra_duty && $curr_time < $extra_duty) {

                        if ($record->extra_notification_status == 0) {

                            $fcm_token = $user->fcm_token;
                            // $fcm_token = $record->user()->fcm_token;
                            $message = "You Working time extended from" . date("H:i", strtotime($addtionlHrs->from_time)) . " to " . date("H:i", strtotime($addtionlHrs->to_time));
                            $title = "Work time extended";
                            $record->update(['extra_notification_status' => 1]);
                            $this->sendNotification($fcm_token, $message, $title);
                        }
                    } else {
                        //return response()->json($CheckOutData, 200);
                    }
                }
            }
        }

        $this->info('uncheckout:cron Cummand Run successfully!');
    }


    public function sendNotification($fcm_token, $message, $title)
    {

        try {

            $data = array(
                "to" => $fcm_token,
                "notification" => array(
                    "body" => $message,
                    "title" => $title,
                )
            );

            $data = json_encode($data);

            //FCM API end-point
            $url = 'https://fcm.googleapis.com/fcm/send';

            $api_key = 'AAAANRLAKQ4:APA91bF3__gEtfa5LFBM1xCQz6-Prg5Ax6LMLrWdwNFlpOKuC345UsQ3uVbOpJlVzsCrCvRq9yb-8jtsMge044UF193TFQnihekL06DmMMpVexJSu28RZbaJ9P2OzFwL8sJrB0e5KhWV';

            //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
            // $auth_key = env("ANDROID_PTW_AUTH_KEY");

            //header with content_type api key
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $api_key,
            );

            //CURL request to route notification to FCM connection server (provided by Google)
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            $result = curl_exec($ch);
            curl_close($ch);
            if ($result === FALSE) {
                return 0; //curl_error($ch);
            } else {


                $params =["action_id"=>'AlertNotification',"crud_id"=>"Add","menu"=>"AlertNotification", "comments"=>$title." - ".$message,"action_data"=>json_encode($result), "log_from"=>'Web'];
                UserActivity($params);

                $response = json_decode($result);
                //Log::info(json_encode($response));
                return 1; //$response->success;
            }
        } catch (\Exception $e) {
            $data = [
                "IsError" => true,
                "Message" => $e->getMessage(),
                "List" => null
            ];
            return 0;
        }
    }

    public  function TotalWorkingTime($UserId, $companyId, $date, $startTime, $currentEndTime)
    {

        $result = StaffPunchRecords::where('punch_date', $date)
            ->where('user_id', $UserId)
            ->where('company_id', $companyId)->orderBy('id', 'desc')
            ->get();


        $totalhrs = Carbon::create("00:00");
        foreach ($result as $item) {

            $totalHrs =  explode(':', $item->total_hours);
            if (@$totalHrs[0]) {
                $totalhrs = $totalhrs->addHour($totalHrs[0]);
            }
            if (@$totalHrs[1]) {
                $totalhrs = $totalhrs->addMinute($totalHrs[1]);
            }
        }

        $total_working_hours =  $totalhrs->format('H:i');

        $AttendanceRecord = AttendanceRecord::where('punch_date', $date)
            ->where('user_id', $UserId)
            ->where('company_id', $companyId)->orderBy('id', 'desc')
            ->first();

        if ($AttendanceRecord) {
            $AttendanceRecord->update([
                'total_working_hours' => $total_working_hours,
                "time_in" => $startTime,
                "time_out" => $currentEndTime,
            ]);
        }
    }
}
