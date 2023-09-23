<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Bylaw;
use App\Models\Category;
use App\Models\member;
use App\Models\ExecutiveCommittees;
use App\Models\History;
use App\Models\LearningPath;
use App\Models\Sponsor;
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
use stdClass;

class SponsorController extends BaseController
{

    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        try {

            $categories = Category::where("status", "1")->where("org_id", Auth::user()->id)->get();

            $colors = ["1" => "0xFF627285", "2" => "0xFFE9B05F", "3" => "0xFFD9D9D9"];
            if (count($categories)) {

                // $result = $categories->map(function ($value, $key) use ($colors) {
                //     if($value->sponsor->count())  {
                //         $data["id"] = $value->id;
                //         $data["category_name"]  = $value->name;
                //         $data["category_color"] = $colors[$key + 1];
                //         return $data;
                //     } else{
                //         return new stdClass;
                //     }

                // });

                $result =[];

                foreach ($categories as $key=> $value) {

                    if ($value->sponsor->count()) {
                        $data["id"] = $value->id;
                        $data["category_name"]  = $value->name;
                        $data["category_color"] = $colors[$key + 1];
                       $result[] = $data;
                    }
                }
            } else {
                $result = [];
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


    public function categoryImageList(Request $request)
    {


        try {

            $validator = Validator::make($request->all(), [
                'category_id' => 'required'
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }

            $sponsors = Sponsor::where("category_id", $request->category_id)->where("org_id", Auth::user()->id)->where("status", "1")->get();

            if (count($sponsors)) {
                $result = $sponsors->map(function ($value, $key) {
                    $data["id"] = $value->id;
                    $data["category_id"] = $value->category_id;
                    $data["url_link"] = @$value->url_link ? $value->url_link : "";
                    $data['description'] = @$value->description;
                    $shot_desc = strip_tags(@$value->description);
                    $data['shot_description'] = $shot_desc;
                    $data['imp_path'] =  @$value->img_path ? $this->getFileUrl($value->img_path) : "";
                    return $data;
                });
            } else {
                $result = [];
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


    public function sponsorView(Request $request)
    {
        // $categories = ::where("status", "1")->where("org_id", Auth::user()->id)->get();

        try {

            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);

            if ($validator->fails()) {
                $data = array("is_error" => true, "message" => $validator->messages());
                return response()->json($data, 200);
            }


            $sponsor = Sponsor::where("id", $request->id)->where("status", "1")->first();

            if ($sponsor) {
                $result["id"] = $sponsor->id;
                $result["img_path"] =  @$sponsor->img_path ? $this->getFileUrl($sponsor->img_path) : "";
                $result["description"] = $sponsor->description;
                $result["url_link"] = @$sponsor->url_link ? $sponsor->url_link : "";
            } else {
                $result = [];
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
