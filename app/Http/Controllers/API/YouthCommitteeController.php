<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\member;
use App\Models\ExecutiveCommittees;
use App\Models\LearningPath;
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


class YouthCommitteeController extends BaseController
{
    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {


        try {


            $type = $request->member_type;


            $members = YouthCommittees::where("status", "1")->where("org_id", Auth::user()->id)->get();

            $result = $members->map(function ($value)  use ($type) {
                $data["id"] = $value->id;
                $data["member_name"] = $value->name;
                $data["member_description"] = $value->description;
                $data["member_designation"] = $value->designation;

                $shot_desc = strip_tags($value->description);
                $data['member_shot_description'] = $shot_desc;
                $data['member_photo'] = @$value->img_path != "" ? $this->getFileUrl($value->img_path) : "";

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
            $youthCommittees = YouthCommittees::where("id", $id)->where("status", "1")->where("org_id", Auth::user()->id)->first();

            if ($youthCommittees) {

                $result["id"] = $youthCommittees->id;
                $result["member_name"] = $youthCommittees->name;
                $result["member_description"] = $youthCommittees->description;
                $shot_desc = strip_tags($youthCommittees->description);
                $result['member_shot_description'] = $shot_desc;
                $result["member_designation"] = $youthCommittees->designation;
                $result['member_photo'] = $youthCommittees->img_path ? $this->getFileUrl($youthCommittees->img_path) : "";

                $data = [
                    "is_error" => false,
                    "message" => "Success",
                    "details" => $result,
                ];
            } else {

                $data = [
                    "is_error" => true,
                    "message" => "No Record found",
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
