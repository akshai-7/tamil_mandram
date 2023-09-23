<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Traits\FileUpload;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class CategoryController extends Controller
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
            $data = Category::where("org_id",Auth::user()->id)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">' . $row->status_name . '</span>';
                    }
                    return '<span class="badge bg-danger">' . $row->status_name . '</span>';
                })

                ->addColumn('action', function ($row) {
                    $btn  = "    <button style='background: none;color: inherit;border: none;padding: 0; font: inherit; cursor: pointer; outline: inherit;' class='edit_category' value='" . $row->id . "' name='del_btn'><i class='fa fa-edit'></i></button>";
                    return $btn;
                })


                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search')['value'])) {

                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $value = $request->get('search')['value'];
                             if (Str::contains(Str::lower(@$row['status_name']), Str::lower($value))) {
                                return true;
                            }
                            else if (Str::contains(Str::lower(@$row['name']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('category.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.add');
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
                    'banner_image_path'  => $this->FileEncrpty($request->image_src, "banner_image_path")
                ]);
            }


            $request->merge([
                'status' => $request->input('status')  ? "1" : "0",
                "org_id" => Auth::user()->id,
                "created_by" => Auth::user()->id,
            ]);

            Banner::create($request->except('_token'));
            DB::commit();
            return redirect('category')->with(['success' => "Sponsors category added successfully"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
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
        $fileDecrypt = '';
        $data = Banner::where('id', decrypt($id))->first();
        $filepath = $data->banner_image_path;
        if($filepath) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }
        return view('banner.list', compact('data', 'fileDecrypt', 'fileEncrypt'));
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
    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                // 'URL' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }
            $id = $request->id;

            if ($request->image_src) {
                $request->merge([
                    'banner_image_path'  => $this->FileEncrpty($request->image_src, "banner_image_path")
                ]);
            }

            $request->merge([
                'status' => $request->input('oldstatus')  ? "1" : "0",
                "updated_by" => Auth::user()->id
            ]);

            Category::where('id', $id)->update($request->except('_token','_method','image_src',"image","oldstatus"));
            DB::commit();
            return redirect('category')->with(['success' => "Sponsors category updated successfully"]);
        } catch (\Exception $e) {

            dd($e->getMessage());
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
