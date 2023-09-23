<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
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

class SponsorController extends Controller
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
            $data = Sponsor::where("org_id", Auth::user()->id)->orderby("created_at","desc")->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">' . $row->status_name . '</span>';
                    }
                    return '<span class="badge bg-danger">' . $row->status_name . '</span>';
                })

                ->addColumn('category_name', function ($row) {
                    return $row->category->name;
                })

                ->addColumn('action', function ($row) {
                    $btn  = '<a href="' . URL('sponsor', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })

                ->addColumn('img_path', function ($row) {
                    $filepath = $row->img_path;

                    if($filepath) {
                        $fileEncrypt = $this->getFileUrl($filepath);
                        $btn = '';
                        if ($fileEncrypt) {
                            $btn = '<image src=' . $fileEncrypt . ' style="width: 100px;height:60px;padding-top:0px;margin-left: 70px;" alt="">';
                        }
                        return $btn;
                    }
                    return "";
                })

                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search')['value'])) {

                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $value = $request->get('search')['value'];
                            if (Str::contains(Str::lower(@$row['status_name']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['category_name']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->rawColumns(['action', 'status','img_path'])
                ->make(true);
        }
        return view('sponsor.list');
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


            if ($request->image_src) {
                $request->merge([
                    'img_path'  => $this->FileEncrpty($request->image_src, "sponsor_image_path")
                ]);
            }


            $request->merge([
                'status' => $request->input('status')  ? "1" : "0",
                "org_id" => Auth::user()->id,
                "created_by" => Auth::user()->id,
            ]);


            Sponsor::create($request->except('_token', 'files', 'image_src', "image"));
            DB::commit();
            return redirect('sponsor')->with(['success' => "Sponsor added successfully"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
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
        $data = Sponsor::where('id', decrypt($id))->first();
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

        $editOldData = Category::find($id);

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
    public function update($id,Request $request)
    {
        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                // 'URL' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }
            $id = decrypt($id);


            if ($request->image_src) {
                $request->merge([
                    'img_path'  => $this->FileEncrpty($request->image_src, "sponsor_image_path")
                ]);
            }

            $request->merge([
                'status' => $request->input('status')  ? "1" : "0",
                "updated_by" => Auth::user()->id
            ]);


            Sponsor::where('id', $id)->update($request->except('_token', 'files', 'image_src', "image","_method"));
            DB::commit();
            return redirect('sponsor')->with(['success' => "Sponsor updated successfully"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
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
