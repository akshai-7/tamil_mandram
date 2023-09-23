<?php

namespace App\Http\Controllers;

use App\Events\EventNotification;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SendNotification;
use App\Models\Sponsor;
use App\Traits\FileUpload;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SendNotificationController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = SendNotification::where("org_id", Auth::user()->id)->orderBy("created_at","desc")->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('created_at', function ($row) {
                    return date('m-d-Y',strtotime($row->created_at));
                })

                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">' . $row->status_name . '</span>';
                    }
                    return '<span class="badge bg-danger">' . $row->status_name . '</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn  = "    <button style='background: none;color: inherit;border: none;padding: 0; font: inherit; cursor: pointer; outline: inherit;' class='edit_send_notification' value='" . $row->id . "' name='del_btn'><i class='fa fa-edit'></i></button>";
                    return $btn;
                })

                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search')['value'])) {

                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $value = $request->get('search')['value'];
                            if (Str::contains(Str::lower(@$row['message']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['title']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->rawColumns(['action', 'status','img_path'])
                ->make(true);
        }
        return view('notification.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where("status", "1")->where("org_id", Auth::user()->id)->get();
        $categories = @$categories->pluck("name", "id");
        return view('sponsor.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();


            // dd($request->all());

            $request->merge([
                'status' => $request->input('status')  ? "1" : "0",
                "org_id" => Auth::user()->id,
                "created_by" => Auth::user()->id,
            ]);


            $result = SendNotification::create($request->except('_token'));
            DB::commit();

            event(new EventNotification(Auth::user(),$result));
//            dd("sdf");

            return redirect('send-notification')->with(['success' => "Notification sent to all user successfully."]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where("status", "1")->where("org_id", Auth::user()->id)->get();
        $categories = @$categories->pluck("name", "id");

        $fileDecrypt = '';
        $data = SendNotification::where('id', decrypt($id))->first();
        $filepath = @$data->img_path;
        $fileEncrypt = "";
        if ($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }

        return view('sponsor.edit', compact('data', 'fileDecrypt', 'fileEncrypt','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editOldData = SendNotification::find($id);

        if ($editOldData) {
            return response()->json([
                'ststus' => 200,
                'editOldData' => $editOldData,
            ]);
        } else {
            return response()->json([
                'ststus' => 400,
                'message' => 'id is not founf',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            DB::beginTransaction();


            $id = $request->id;

            $request->merge([
                "updated_by" => Auth::user()->id
            ]);


            SendNotification::where('id', $id)->update($request->except('_token','_method'));
            $result = SendNotification::where('id', $id)->first();
            DB::commit();
            event(new EventNotification(Auth::user(),$result));
            return redirect('send-notification')->with(['success' => "Notification message updated successfully"]);
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
