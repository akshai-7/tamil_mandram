<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Bylaw;
use App\Models\member;
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


class BylawController extends BaseController
{
    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        try {

            $members = Bylaw::where("status", "1")->where("org_id", Auth::user()->id)->get();

            $type = $request->event_type;

            $result = $members->map(function ($value)  use ($type) {
                $data["id"] = $value->id;
                $data["name"] = $value->name;
                $data["description"] = $value->description;
                $shot_desc = strip_tags($value->description);
                $data['shot_description'] = $shot_desc;
                $data['photo'] = $value->img_path ? $this->getFileUrl($value->img_path) : "";
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
            $bylaw = Bylaw::where("id", $id)->where("status", "1")->where("org_id", Auth::user()->id)->where("status", "1")->first();

            if($bylaw) {
                $result["id"] = $bylaw->id;
                $result["name"] = $bylaw->name;
                $result["description"] = $bylaw->description;
                $shot_desc = strip_tags($bylaw->description);
                $result['shot_description'] = $shot_desc;
                $result['photo'] = $bylaw->img_path ? $this->getFileUrl($bylaw->img_path) : "";
            } else{
                $result =[];
            }


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
}
