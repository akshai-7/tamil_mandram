<?php

namespace App\Http\Controllers\API;

use App\Models\Banner;
use App\Models\Bylaw;
use App\Models\member;
use App\Models\ExecutiveCommittees;
use App\Models\History;
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


class HistoryController extends BaseController
{
    use FileUpload;
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        try {

            $history = History::where("status", "1")->where("org_id", Auth::user()->id)->first();
            
            $result["id"] = @$history->id ? $history->id : "";
            $result["description"] = @$history->history_description ? @$history->history_description : "";
            $result['photo'] =  @$history->img_path ? $this->getFileUrl($history->img_path) : "";
            
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
