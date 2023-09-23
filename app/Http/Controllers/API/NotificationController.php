<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class NotificationController extends BaseController
{
    public function index(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                // 'page_no' => 'integer',
                "fcm_token" => "required",
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }

            $limit = 10;
            $org_id = Auth::user()->id;
            $offset = $request->input('page_no');
            $offset = ($offset != "") ? $offset : 0;



            $get_notification = Notification::where('org_id', $org_id)->where("fcm_token", $request->fcm_token)->orderBy('id', 'DESC')->orderBy('is_read', 'ASC');

            // if($offset) {
            //     $get_notification = $get_notification->offset($offset * $limit)->take($limit);
            // } else{

            //     $get_notification = $get_notification->take(10);
            // }

            $get_notification = $get_notification->get();



            $notification_details = [];
            foreach ($get_notification as $key => $value) {
                $notification_details[$key]['notification_id'] = (int)$value->id;
                $notification_details[$key]['read_status'] = (int)$value->is_read;
                $notification_details[$key]['read_status_name'] = ($value->is_read == '0') ? "Unread" : "Read";
                $notification_details[$key]['color'] = ($value->is_read == '0') ? "0xFF2CA2D1" : "0xFF627285";
                $notification_details[$key]['created'] = date('d-M-Y h:i a',strtotime($value->created));
                $response_data = unserialize(@$value->response_data);
                $notification_details[$key]['message'] = @$response_data['notification']['body'];
                $notification_details[$key]['title'] = @$response_data['notification']['title'];
            }


            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $notification_details,
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {

            dd($e);
            $data = [
                "is_error" => true,
                "message" => $e->getMessage()

            ];
            return response()->json($data, 200);
        }
    }


    public function getNotificationCount(Request $request)
    {

        try {
            DB::beginTransaction();
            $user_id = Auth::user()->id;

            $validator = Validator::make($request->all(), [
                'page_no' => 'integer',
                "fcm_token" => "required",
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }

            $get_unreaded_notification_count = Notification::where('org_id', $user_id)->where("fcm_token", $request->fcm_token)->where('is_read', '0')->where('is_important', '1')->count();

            $data = [
                "is_error" => false,
                "message" => "Success",
                "no_of_notifications" => $get_unreaded_notification_count,
            ];
            return response()->json($data, 200);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $data = [
                "is_error" => true,
                "message" => $e->getMessage()

            ];
            return response()->json($data, 200);
        }
    }



    public function notificationRead(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'notification_id' => 'integer',
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }

            $notification_id = $request->input('notification_id');
            $notification_read_data = DB::table('notifications')->where('id', $notification_id)->where('is_read', '0')->first();
            if ($notification_read_data != "") {
                $update_read = DB::table('notifications')->where('id', $notification_id)->update(['is_read' => '1']);
            }


            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => "Notification read successfully!",
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [
                "is_error" => true,
                "message" => $e->getMessage()

            ];
            return response()->json($data, 200);
        }
    }
}
