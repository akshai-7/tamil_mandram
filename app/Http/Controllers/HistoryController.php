<?php

namespace App\Http\Controllers;

use App\Models\Bylaw;
use App\Models\Event;
use App\Models\History;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Str;

class HistoryController extends Controller
{

    use FileUpload;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $history = History::where("org_id",Auth::user()->id)->first();

        $filepath = @$history->img_path;

        $fileEncrypt = "";
        $fileDecrypt = "";

        if ($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }

        $data['data'] = $history;
        $data['fileEncrypt'] = $fileEncrypt;
        $data['fileDecrypt'] = $fileDecrypt;

        return view('history',$data);
    }



    public function create()
    {
        return view("by_law.add");
    }


    public function save(Request $request)
    {
        // dd($request->all());

        try {

            DB::beginTransaction();

            $id = @$request->id;

            if ($request->image_src) {
                $request->merge([
                    'img_path'  => $this->FileEncrpty($request->image_src, "history_img_path")
                ]);
            }

            $request->merge(
                [
                    "org_id" => Auth::user()->id,
                    'status' => $request->input('status')  ? "1" : "0",
                ]
            );

            if($id) {
                History::where("id",$id)->update($request->except('_token', 'image', 'image_src',"image","files"));
                $msg = "History updated successfully.";
            } else{
                History::create($request->except('_token', 'image', 'image_src',"image","files"));
                $msg = "History created successfully.";
            }
            DB::commit();
            return redirect('history')->with(['success' => $msg]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        $fileDecrypt = '';
        $data =Bylaw::where('id', decrypt($id))->first();
        $filepath = $data->img_path;
        $fileEncrypt = "";
        if ($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }
        return view('by_law.edit', compact('data', 'fileDecrypt', 'fileEncrypt'));
    }


    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();
            $id = decrypt($id);

            if ($request->image_src) {
                $request->merge([
                    'img_path'  => $this->FileEncrpty($request->image_src, "event_image_path")
                ]);
            }
            $request->merge(
                [
                    'status' => $request->input('status')  ? "1" : "0",
                ]
            );

            Bylaw::where('id', $id)->update($request->except('_token', '_method', 'image_src', "image", "event_title"));
            DB::commit();
            return redirect('by-law')->with(['success' => "By law updated successfully"]);
        } catch (\Exception $e) {

            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
