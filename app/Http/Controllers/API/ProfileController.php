<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Bylaw;
use App\Models\Event;
use App\Models\ExecutiveCommittees;
use App\Models\History;
use App\Models\LearningPath;
use App\Models\Menu;
use App\Models\NativeLanguage;
use App\Models\Notification;
use App\Models\Organization;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\YouthCommittees;
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


class ProfileController extends BaseController
{

    use FileUpload;

    public function index()
    {

        try {


            $user = User::find(Auth::user()->id);
            $user_details['org_name'] = $user->organization->org_name;
            $user_details['org_code'] = $user->organization->org_code;
            $user_details['org_id'] = $user->id;
            $user_details['org_mobile'] = $user->decrypt_mobile;
            $user_details['org_email'] = $user->decrypt_email;
            $user_details['org_log_image'] = @$user->organization->org_logo ? $this->getFileUrl($user->organization->org_logo) : "";

            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $user_details,
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

        $user = User::find(Auth::user()->id);
        $org = $user->organization;
        $colors['header_color'] =  $org->header_color ?  "#" . $org->header_color : "#FFFFFF";
        $colors['body_color'] =  $org->body_color ?  "#" . $org->body_color : "#F9F9F9";
        $colors['footer_color'] =  $org->footer_color ? "#" . $org->footer_color : "#5C64F7";
        $data = [
            "is_error" => false,
            "message" => "Success",
            "details" => $colors,
        ];
        return response()->json($data, 200);
    }


    public function contact()
    {
        try {

            $user = User::find(Auth::user()->id);

            $org = $user->organization;

            if ($org) {
                $details['contact_description'] = @$org->contact_description;
            } else {
                $details = [];
            }

            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $details,
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [
                "is_error" => true,
                "message" => $e->getMessage(),
                "details" => [],
            ];
            return response()->json($data, 200);
        }
    }

    public function nativeLanguageMenu()
    {

        try {

            $NativeLanguage  = NativeLanguage::where("status", "1")->where("org_id", Auth::user()->id)->get();


            if (count($NativeLanguage)) {

                $result = $NativeLanguage->map(function ($value) {

                    $data["id"] = $value->id;
                    $data["original_menu"] = $value->menu->name;
                    $data["native_menu"] = strip_tags($value->name);
                    return $data;
                });

                $data = [
                    "is_error" => false,
                    "message" => "Success",
                    "details" => $result,
                ];
            } else {

                $data = [
                    "is_error" => false,
                    "message" => "Success",
                    "details" => [],
                ];
            }

            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [
                "is_error" => true,
                "message" => $e->getMessage(),
                "details" => [],
            ];
            return response()->json($data, 200);
        }
    }

    public function checkMenuStatus(Request $request)
    {

        try {


            $validator = Validator::make($request->all(), [
                "fcm_token" => "required",
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }


            $user = Auth::user();

            $organization = Organization::where("user_id", $user->id)->first();

            $executiveCommittees = ExecutiveCommittees::where("org_id", $user->id)->where("status", "1")->count();
            $byLaws = Bylaw::where("org_id", $user->id)->where("status", "1")->count();

            $history = History::where("org_id", $user->id)->where("status", "1")->count();

            $aboutUs = false;
            if ($executiveCommittees || $byLaws || $history) {
                $aboutUs = true;
            }

            $sponsor = Sponsor::where("org_id", $user->id)->where("status", "1")->count();
            $youthCommittees = YouthCommittees::where("org_id", $user->id)->where("status", "1")->count();
            $notification_count = Notification::where('org_id', $user->id)->where("fcm_token", $request->fcm_token)->where('is_read', '0')->where('is_important', '1')->count();
            $NativeLanguage  = NativeLanguage::where("status", "1")->where("org_id", Auth::user()->id)->get();

            if (count($NativeLanguage)) {

                $native_menu = $NativeLanguage->map(function ($value) {

                    $data["id"] = $value->id;
                    $data["original_menu"] = $value->menu->name;
                    $data["native_menu"] = strip_tags($value->name);
                    return $data;
                });
            } else {
                $native_menu = [];
            }




            $result['event_status'] = Event::checkStatus($user->id);
            $result['upcoming_event_status'] = Event::eventCount($upcoming = 1, $user->id);
            $result['past_event_status'] = Event::eventCount($past = 2, $user->id);
            $result['executive_committee_status'] = @$executiveCommittees ? true : false;
            $result['by_law_status'] = @$byLaws ? true : false;
            $result['history_status'] = @$history ? true : false;
            $result['about_us'] = @$aboutUs;
            $result['sponsor_status'] = @$sponsor ? true : false;
            $result['youth_committees_status'] = @$youthCommittees ? true : false;
            $result['no_of_notifications'] = @$notification_count ? $notification_count : 0;
            $result['native_languages'] = $native_menu;

            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $result,
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [
                "is_error" => true,
                "message" => $e->getMessage(),
                "details" => [],
            ];
            return response()->json($data, 200);
        }
    }
}
