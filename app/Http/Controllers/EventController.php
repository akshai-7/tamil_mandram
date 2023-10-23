<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Traits\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Str;

class EventController extends Controller
{

    use FileUpload;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $event = Event::query();

            if ($request->event_type == 1) {
                $event = $event->whereDate("event_date", ">", date('Y-m-d'));
            } else if ($request->event_type == 2) {
                $event = $event->whereDate("event_date", "<", date('Y-m-d'));
            }

            if ($request->from_date) {

                $from_date = date('Y-m-d', strtotime($request->from_date));
                $event = $event->whereDate("event_date", ">=", $from_date);
            }

            if ($request->to_date) {

                $to_date = date('Y-m-d', strtotime($request->to_date));

                $event = $event->whereDate("event_date", "<=", $to_date);
            }

            $data = $event->where("org_id", Auth::user()->id)->orderBy("created_at", "asc")->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('event_type', function ($row) {
                    return $row->getEventType();
                })
                ->editColumn('event_date', function ($row) {
                    return date('m-d-Y', strtotime($row->event_date));
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">Active</span>';
                    }
                    return '<span class="badge bg-danger">Inactive</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn  = '<a href="' . URL('event', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })


                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search')['value'])) {

                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $event_data = $row['even_data'];
                            $value = $request->get('search')['value'];
                            if (Str::contains(Str::lower(@$row['status_name']), Str::lower($value))) {
                                return true;
                            } else if(Str::contains(Str::lower(@$event_data), Str::lower($value))) {
                                return true;
                            } else if(Str::contains(Str::lower(@$row['event_name']), Str::lower($value))) {
                                return true;
                            } else if(Str::contains(Str::lower(@$row['event_type']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->rawColumns(['action', 'status', 'event_date', 'event_type'])
                ->make(true);
        }
        return view('event.list');
    }



    public function create()
    {

        return view("event.add");
    }


    public function store(Request $request)
    {
        // dd($request->all());

        try {

            DB::beginTransaction();

            if ($request->image_src) {
                $request->merge([
                    'event_img_path'  => $this->FileEncrpty($request->image_src, "event_image_path")
                ]);
            }

            $request->merge(
                [
                    'event_date' => Carbon::createFromFormat('m-d-Y',$request->event_date)->format('Y-m-d'),
                    "org_id" => Auth::user()->id,
                    "event_name" => $request->event_title,
                    'status' => $request->input('status')  ? "1" : "0",
                ]
            );

            Event::create($request->except('_token', 'image', 'image_src',"event_title"));
            DB::commit();
            return redirect('event')->with(['success' => "Event created successfully..!"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        $fileDecrypt = '';
        $data = Event::where('id', decrypt($id))->first();

        $filepath = $data->event_img_path;
        $fileEncrypt = "";
        if ($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }
        return view('event.edit', compact('data', 'fileDecrypt', 'fileEncrypt'));
    }


    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();
            $id = decrypt($id);

            if ($request->image_src) {
                $request->merge([
                    'event_img_path'  => $this->FileEncrpty($request->image_src, "event_image_path")
                ]);
            }
            $request->merge(
                [
                    'event_date' => Carbon::createFromFormat('m-d-Y',$request->event_date)->format('Y-m-d'),
                    "event_name" => $request->event_title,
                    'status' => $request->input('status')  ? "1" : "0",
                ]
            );

            Event::where('id', $id)->update($request->except('_token', '_method', 'image_src', "image","event_title"));
            DB::commit();
            return redirect('event')->with(['success' => "Event updated successfully"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}