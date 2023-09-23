<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Users;

class dailyCheckListCron extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checklist:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Checklists for Property';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {


//        $get_checklist = DB::table('checklists')->where('status', '1')->get();
        $get_checklist = DB::table("checklists")->get();
        foreach ($get_checklist as $key => $value) {
            $get_patrol_setting = DB::table('check_point_patrol_settings')->where('property_id', $value->property_id)->get();




            foreach ($get_patrol_setting as $key => $value_patrol) {
                $cron_time = date('H:i', strtotime($value_patrol->start_time));



                if (date("H:i") == $cron_time) {
                $checklist_report = [];
//                foreach ($get_checklist as $key => $value) {


                $check_report = DB::table('checklist_reports')->where('property_id', $value_patrol->property_id)->where('shift_slot_id', $value_patrol->id)
                                ->where('checklist_id', $value->id)
                                ->where('checkpoint_id', $value->checkpoint_id)
                                ->where('shift_id', $value_patrol->shift_id)
                                ->where('checklist_date', date('Y-m-d'))->first();
                if ($check_report != "") {
//                    $checklist_report[$key]['checklist_id']=$value->id;
                    $checklist_report['company_id'] = $value->company_id;
                    $checklist_report['property_id'] = $value->property_id;
                    $checklist_report['checkpoint_id'] = $value->checkpoint_id;
                    $checklist_report['shift_id'] = $value_patrol->shift_id;
                    $checklist_report['shift_slot_id'] = $value_patrol->id;
                    $checklist_report['slot_from_time'] = $value_patrol->start_time;
                    $checklist_report['slot_to_time'] = $value_patrol->end_time;
                    $checklist_report['description'] = $value->description;
//                    $checklist_report[$key]['checklist_date']=date('Y-m-d');
//                        $update_check_list = DB::table('checklist_reports')
//                                        ->where('id', $value->id)
//                                        ->where('checklist_date', date('Y-m-d'))->update($checklist_report);
                } else {

                    $checklist_report['checklist_id'] = $value->id;
                    $checklist_report['company_id'] = $value->company_id;
                    $checklist_report['property_id'] = $value->property_id;
                    $checklist_report['checkpoint_id'] = $value->checkpoint_id;

                    $checklist_report['shift_id'] = $value_patrol->shift_id;
                    $checklist_report['shift_slot_id'] = $value_patrol->id;
                    $checklist_report['slot_from_time'] = $value_patrol->start_time;
                    $checklist_report['slot_to_time'] = $value_patrol->end_time;
                    $checklist_report['description'] = $value->description;
                    $checklist_report['checklist_date'] = date('Y-m-d');

                    $update_check_list = DB::table('checklist_reports')
                            ->insert($checklist_report);
                }
                if ($key == 0) {
                    $get_today_users = DB::table("scheduled_jobs")->where('shift_id', $value_patrol->shift_id)->where('schedule_date', date('Y-m-d'))->where('job_type', '1')->get();


                    foreach ($get_today_users as $key => $values) {
                        $get_fcm_details = Users::where('id', $values->user_id)->first();
                        if ($get_fcm_details != "" && $get_fcm_details->fcm_token != "" && $get_fcm_details->device == '1') {




                            $fcm_token = $get_fcm_details->fcm_token;
                            $device = $get_fcm_details->device;
                            $data = array(
                                "to" => $get_fcm_details->fcm_token,
                                "data" => [
                                    "body" => [
                                        "message" => "You have received patrol notification",
                                        "type" => "4",
                                        "unique_id" => $value_patrol->id,
                                        "title" => $value_patrol->patrol_name,
                                    ]
                                ]
                            );

                            $insert_notifiatioin = DB::table('notifications')->insertGetId(
                                    ['user_id' => $get_fcm_details->id, 'notification_type' => '4', 'notification_type_name' => 'Schedule',
                                        'unique_id' => $value_patrol->id, 'response_data' => serialize($data), 'notification_token_id' => $get_fcm_details->fcm_token,
                                        'is_important' => '1', 'created_at' => 8]);


                            $data = array(
                                "to" => $fcm_token,
                                "data" => [
                                    "body" => [
                                        "message" => "You have received patrol notification",
                                        "type" => "4",
                                        "unique_id" => $value_patrol->id,
                                        "notification_id" => $insert_notifiatioin,
                                        "title" => $value_patrol->patrol_name,
                                    ]
                                ]
                            );



                            $update_notification = DB::table('notifications')->where('id', $insert_notifiatioin)->update(['response_data' => serialize($data)]);


                            HomeController::AndroidPushNotification($data);
                        }
                    }
                    }
                }
           }
        }





        $this->info('checklist:cron Cummand Run successfully!');
    }

}
