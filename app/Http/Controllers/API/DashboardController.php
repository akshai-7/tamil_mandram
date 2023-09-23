<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Event;
use App\Models\ExecutiveCommittees;
use App\Models\LearningPath;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Hash;
use Storage;
use PDF;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Routing\Controller as BaseController;


class DashboardController extends BaseController
{

    use FileUpload;

    public function index()
    {

        try {


            $user = User::find(Auth::user()->id);
            $organization  = $user->organization;

            $org_details['org_id']           = @$user->id;
            $org_details['org_name']         = @$organization->org_name;
            $org_details['org_code']         = @$organization->org_code;
            $org_details['org_mobile']       = @$user->decrypt_mobile;
            $org_details['org_email']        = @$user->decrypt_email;
            $org_details['org_log_image']    = @$organization->org_logo ? $this->getFileUrl($organization->org_logo) : "";

            $org_details['org_header_color'] = @$organization->header_color ? "#" . $organization->header_color :  "#FFFFFF";
            $org_details['org_body_color']   = @$organization->body_color ? "#" . $organization->body_color :  "#F9F9F9";
            $org_details['org_footer_color'] = @$organization->footer_color ? "#" . $organization->footer_color :  "#5C64F7";

            $org_details['about_us'] = @$organization->about_us!=""  ?  $organization->about_us : "";

            $org_details['notification_count'] = "2";

            $event = Event::where("event_date", ">", date('Y-m-d'))->where("org_id", Auth::user()->id)->where("status","1")->orderBy("event_date", "asc")->first();

            $members = ExecutiveCommittees::where("status", "1")->where("org_id", Auth::user()->id)->latest('created_at')->take(3)->get();

            $membersDetails = $members->map(function ($value)  {
                $data["id"] = $value->id;
                $data["member_name"] = $value->name;
                $data["member_description"] = $value->description;
                $data["member_designation"] = $value->designation;
                $shot_desc = strip_tags($value->description);
                $data['member_shot_description'] = $shot_desc;
                $data['member_photo'] = @$value->img_path ? $this->getFileUrl($value->img_path) : "";

                return $data;
            });

            $org_details['executive_committees_error_status'] = count($membersDetails) ? false :true;
            $org_details['executive_committees'] = $membersDetails;

            if ($event) {
                $org_details['upcoming_event_error_status'] = false;
                $org_details['upcoming_event_error_message'] = "";
                $org_details['event_detail']['id']  = $event->id;
                $org_details['event_detail']['event_name']  = $event->event_name;
                $org_details['event_detail']['event_img']   = @$event->event_img_path ? $this->getFileUrl($event->event_img_path) : "";
                $org_details['event_detail']['event_date']  = date('d', strtotime($event->event_date));
                $org_details['event_detail']['event_month'] = date('M', strtotime($event->event_date));
                $org_details['event_detail']['event_Year']  = date('Y', strtotime($event->event_date));
                $org_details['event_detail']['event_Year']  = date('Y', strtotime($event->event_date));
            } else {
                $org_details['upcoming_event_error_status'] = true;
                $org_details['upcoming_event_error_message'] = "No Upcoming event";
                $org_details['event_detail']['id']  = "";
                $org_details['event_detail']['event_img'] = "";
                $org_details['event_detail']['event_name'] = "";
                $org_details['event_detail']['event_date'] = "";
                $org_details['event_detail']['event_month'] = "";
                $org_details['event_detail']['event_Year'] = "";
            }



            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $org_details,
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {

            $data = [
                "is_error" => true,
                "message" => "errors",
                "details" => $e->getMessage(),
            ];
            return response()->json($data, 200);
        }
    }



    public function colorSetting()
    {

        $colors['header_color'] =  "#C42A68";
        $colors['body_color'] =  "#F5F5F5";
        $colors['footer_color'] =  "#C42A68";
        $data = [
            "is_error" => false,
            "message" => "Success",
            "details" => $colors,
        ];
        return response()->json($data, 200);
    }
}
