<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ExecutiveCommittees;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Str;
use Illuminate\Support\Facades\Validator;

class ExecutiveCommitteeController extends Controller
{

    use FileUpload;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ExecutiveCommittees = ExecutiveCommittees::query();



            $data = $ExecutiveCommittees->where("org_id", Auth::user()->id)->orderBy("created_at", "desc")->get();

            return DataTables::of($data)
                ->addIndexColumn()


                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">Active</span>';
                    }
                    return '<span class="badge bg-danger">Inactive</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn  = '<a href="' . URL('executive-committee', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })

                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search')['value'])) {
                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $value = $request->get('search')['value'];
                            if (Str::contains(Str::lower(@$row['status_name']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['name']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['designation']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('e_committee.list');
    }



    public function create()
    {

        return view("e_committee.add");
    }


    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate([
            'description' => 'required|min:10', // Add any other rules you need
        ]);

        try {

            DB::beginTransaction();

            if ($request->image_src) {
                $request->merge([
                    'img_path'  => $this->FileEncrpty($request->image_src, "executive_committees_image_path")
                ]);
            }

            $request->merge(
                [
                    "org_id" => Auth::user()->id,
                    'status' => $request->input('status')  ? "1" : "0",
                ]
            );

            ExecutiveCommittees::create($request->except('_token', 'image', 'image_src', "image"));
            DB::commit();
            return redirect('executive-committee')->with(['success' => "Executive committee created successfully..!"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        $fileDecrypt = '';
        $data = ExecutiveCommittees::where('id', decrypt($id))->first();
        $filepath = @$data->img_path;
        $fileEncrypt = "";
        if ($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }
        return view('e_committee.edit', compact('data', 'fileDecrypt', 'fileEncrypt'));
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
            ExecutiveCommittees::where('id', $id)->update($request->except('_token', '_method', 'image_src', "image", "event_title"));
            DB::commit();
            return redirect('executive-committee')->with(['success' => "Executive committee updated successfully"]);
        } catch (\Exception $e) {

            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
