<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Event;
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


class EventController extends BaseController
{
    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {


        try {

            // dd(Auth::user()->id);
            /** type - 1 - upcoming events , 2 - past events  */
            $type = $request->event_type;

            if ($type == 1) {
                $events = Event::where("event_date", ">", date('Y-m-d'))->where("org_id", Auth::user()->id)->where("status", "1")->get();
            } else {
                $events = Event::where("event_date", "<", date('Y-m-d'))->where("org_id", Auth::user()->id)->where("status", "1")->get();
            }

            // dd(Auth::user()->id);
            $result = $events->map(function ($value)  use ($type) {

                $data["id"] = $value->id;
                $data["event_name"] = $value->event_name;
                $data["event_date"] = date('m-d-Y', strtotime($value->event_date));
                $data["event_description"] = $value->event_description;
                $data['event_date'] = date('d', strtotime($value->event_date));
                $data['event_month'] = date('M', strtotime($value->event_date));
                $shot_desc = strip_tags($value->event_description);
                $data['event_shot_description'] = $shot_desc;
                $data["event_photo_gallery_link"] = $value->event_photo_gallery_link;
                if ($type == 1) {
                    $data["event_by_ticket_link"] = $value->event_by_ticket_link;
                }
                $data['event_photo'] = $value->event_img_path ? $this->getFileUrl($value->event_img_path) : "";

                return $data;
            });

            $data = [
                "is_error" => false,
                "message" => "Success",
                "details" => $result,
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


    public function view(Request $request)
    {

        try {


            $id = $request->id;
            $type = @$request->type;
            $event = Event::where("id", $id)->where("status", "1")->where("org_id", Auth::user()->id)->first();

            if ($event) {


                $result["id"] = $event->id;
                $result["event_name"] = $event->event_name;
                $result["event_date"] = date('m-d-Y', strtotime($event->event_date));
                $result["event_description"] = $event->event_description;
                $result['event_date'] = date('d', strtotime($event->event_date));
                $result['event_month'] = date('M', strtotime($event->event_date));
                $shot_desc = strip_tags($event->event_description);
                $result['event_shot_description'] = $shot_desc;
                $result["event_photo_gallery_link"] = $event->event_photo_gallery_link;

                if ($type == 1) {
                    $result["event_by_ticket_link"] = $event->event_by_ticket_link;
                } else{
                    $result["event_by_ticket_link"] = "";
                }

                $result['event_photo'] = $event->event_img_path ? $this->getFileUrl($event->event_img_path) : "";

                $data = [
                    "is_error" => false,
                    "message" => "Success",
                    "details" => $result,
                ];
            } else {
                $data = [
                    "is_error" => true,
                    "message" => "No Records found.",
                    "details" => [],
                ];
            }
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
}
