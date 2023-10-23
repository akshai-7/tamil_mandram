<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class NewsController extends Controller
{
    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        try {

            $members = News::where("status", "1")->where("org_id", Auth::user()->id)->get();

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
            $news = News::where("id", $id)->where("status", "1")->where("org_id", Auth::user()->id)->where("status", "1")->first();

            if ($bylaw) {
                $result["id"] = $news->id;
                $result["name"] = $news->name;
                $result["description"] = $news->description;
                $shot_desc = strip_tags($news->description);
                $result['shot_description'] = $shot_desc;
                $result['photo'] = $news->img_path ? $this->getFileUrl($news->img_path) : "";
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
