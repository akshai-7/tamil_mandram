<?php

namespace App\Http\Controllers;

use App\Events\NewUserCourseAssign;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Nationality;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\DriverType;
use App\Models\Gender;
use App\Models\Organization;
use App\Models\PermitType;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Nette\Utils\Json;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserController extends Controller


{

    use FileUpload;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries =  Country::get();
        $nationalities = Nationality::get();
        $states = State::get();
        $cities = City::get();

        $permitTypes = PermitType::getActivePermitTypes();
        $driveTypes = DriverType::getActiveDriveTypes();

        $checkUserCountexists = User::checkUserCount();
        if ($request->ajax()) {

            $data = User::where('user_role', 3);

            if (!Auth::user()->super_admin) {
                $data = $data->where('created_by', Auth::user()->id);
            }
            $data = $data->with('country', 'state', 'city')->get();

            // if ($request->country != '') {
            //     $data = $data->where('u_country', $request->country);
            // }
            // if ($request->state != '') {
            //     $data = $data->where('u_state', $request->state);
            // }
            // if ($request->city != '') {
            //     $data = $data->where('u_city', $request->city);
            // }
            // if ($request->pincode != '') {
            //     $data = $data->where('u_pincode', $request->pincode);
            // }

            if ($request->gender) {
                $data = $data->where('u_gender', $request->gender);
            }

            if ($request->driveType != '') {
                $data = $data->where('driver_type', $request->driveType);
            }

            if ($request->permitType != '') {
                $data = $data->where('type_of_permit', $request->permitType);
            }

            $dataTables = DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {

                    if (!empty($request->get('search')['value'])) {

                        @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {
                            $value = $request->get('search')['value'];
                            $date = @$row['created_at'] ? date('m-d-Y', strtotime(@$row['created_at'])) :  "";
                            if (Str::contains(Str::lower(@$row['org_name'], true), Str::lower($value, true))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['decrypt_mobile']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower($date), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['decrypt_email']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['u_user_id']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['driver_type_name']), Str::lower($value))) {
                                return true;
                            } else if (Str::contains(Str::lower(@$row['permit_name']), Str::lower($value))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })

                ->editColumn('u_email', function ($row) {
                    if ($row->u_email) {
                        return  decrypt($row->u_email);
                    }
                })
                ->addColumn('driver_type_name', function ($row) {
                    return $row->driver ? $row->driver->name : "";
                })
                ->addColumn('permit_name', function ($row) {
                    return $row->type_permit ? $row->type_permit->name : "";
                })
                ->editColumn('u_mobile_no', function ($row) {
                    if ($row->u_mobile_no) {
                        return  decrypt($row->u_mobile_no);
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status === 1) {
                        return  '<td><span class="badge bg-success">Active</span></td>';
                    } else {
                        return '<td><span class="badge bg-danger">inactive</span></td>';
                    }
                })
                ->addColumn('assinged_status', function ($row) {
                    if ($row->created_by) {
                        return  '<td><span class="badge bg-success">Assigned</span></td>';
                    } else {
                        return '<td><span class="badge bg-danger">Not Assigned</span></td>';
                    }
                })
                ->addColumn('exam_points', function ($row) {
                    return  $row->examPoints();
                })
                ->addColumn('gender_name', function ($row) {
                    return  $row->gender ? $row->gender->gender_name: "";
                })
                ->editColumn('created_at', function ($row) {
                    return date('m-d-Y', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    $btn  = '<a href="' . URL('users', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  ><i class="fa fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'status', 'permit_name', 'driver_type_name', 'assinged_status'])
                ->make(true);
            return $dataTables;
        }

        return view(
            'users.list',
            compact(
                // 'data',
                'nationalities',
                'countries',
                'states',
                'cities',
                'checkUserCountexists',
                'permitTypes',
                'driveTypes'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = User::find(Auth::user()->id);

        if ($user->user_role == "2") {
            $organization_user_count = User::where('created_by', $user->id)->count();
            $userLimit =  $user->organization->smart_worker_strength;
            if ($organization_user_count >= $userLimit) {
                return redirect('users')->with(['error' => "Smart Worker limit exists. You can't create new user. So please contact your administrator."]);
            }
        }
        $nationalities = Nationality::get();
        $countries =  Country::get();
        $genders = Gender::get();
        $organizations = Organization::get();
        $driveTypes = DriverType::getActiveDriveTypes();
        $permitTypes = PermitType::getActivePermitTypes();

        return view('users.add', compact(
            'nationalities',
            'countries',
            'genders',
            'organizations',
            'driveTypes',
            'permitTypes'
        ));
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
            $mobileNo = $request->u_mobile_no;
            $email = $request->u_email;
            $password = "123456";
            $emiratesId = $request->u_emirates_id;
            if (!empty($request->image_src)) {
                $request->merge([
                    'u_profile_image'  => $this->FileEncrpty($request->image_src, "users_img"),
                ]);
            }

            $request->merge([
                'status'           => $request->input('status')  ? 1 : 0,
                "u_full_name"      => @$request->u_first_name . @$request->u_middle_name . @$request->u_last_name,
                'u_email'          => encrypt($email),
                'u_mobile_no'      => encrypt($mobileNo),
                'u_emirates_id'    => encrypt($emiratesId),
                'password'         => bcrypt($password),
                'show_password'    => encrypt($password),
                "created_by"       => Auth::user()->id,
                "date_of_birth" => date('Y-m-d', strtotime($request->date_of_birth)),
                "user_role" => 3
            ]);


            $user = User::create($request->all());
            $organization = Organization::where('user_id', Auth::user()->id)->first();
            event(new NewUserCourseAssign($user, $organization));
            DB::commit();
            return redirect('users')->with(['success' => 'User Created Successfully!']);
        } catch (\Exception $exception) {

            DB::rollBack();
            return redirect('users');
            // return $exception->getMessage();
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

        try {
            $nationalities = Nationality::get();
            $countries =  Country::get();
            $states = State::get();
            $cities = City::get();
            $genders = Gender::get();
            $organizations = Organization::get();
            $fileDecrypt = '';
            $data = User::where('id', decrypt($id))->first();
            $driveTypes = DriverType::getActiveDriveTypes();
            $permitTypes = PermitType::getActivePermitTypes();

            if ($data->u_profile_image) {
                $fileEncrypt = decrypt($data->u_profile_image);
                $fileDecrypt = $this->fileDecrypt($fileEncrypt);
                // dd($fileEncrypt);
            }
            return view(
                'users.edit',
                compact(
                    'data',
                    'fileDecrypt',
                    'genders',
                    'nationalities',
                    'countries',
                    'states',
                    'cities',
                    'organizations',
                    'driveTypes',
                    'permitTypes'
                )
            );
        } catch (\Exception $e) {
            //            dd($e );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, UpdateUserRequest $request)
    {
        $id = decrypt($id);
        $user = User::find($id);
        try {

            DB::beginTransaction();
            $mobileNo = $request->input('u_mobile_no');
            $email = $request->input('u_email');
            $emiratesId = $request->input('u_emirates_id');
            $password = $request->input('password');

            if ($request->image_src) {
                $request->merge([
                    'u_profile_image'  => $this->FileEncrpty($request->image_src, "users_img"),
                ]);
            }
            $request->merge([
                'status'           => $request->input('status') ? 1 : 0,
                'u_email'          => encrypt($email),
                "u_full_name"      => $request->u_first_name . $request->u_middle_name . $request->u_last_name,
                'u_mobile_no'      => encrypt($mobileNo),
                'u_emirates_id'    => encrypt($emiratesId),
                'updated_by'       => Auth::user()->id,
                "date_of_birth"    => date('Y-m-d', strtotime($request->date_of_birth)),
                // "permit_issue_date" => date('Y-m-d', strtotime($request->permit_issue_date)),
                // "permit_expiry_date" => date('Y-m-d', strtotime($request->permit_expiry_date)),
                // 'password'         => Hash::make($password),
                // 'show_password'    => Hash::make($password)
            ]);


            if (empty($request['password'])) {
                unset($request['password']);
                unset($request['show_password']);
            } else {
                $request['password'] = Hash::make($request['password']);
                $request['show_password'] = Hash::make($request['show_password']);
            }

            $user->update($request->all());
            DB::commit();

            return redirect('users')->with(['success' => 'User updated Successfully!']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect('users');
            // return $exception->getMessage();
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

    public function checkUserName(Request $request)
    {
        try {
            $id = $request->id;
            $user  = User::query();
            if ($id) {
                $user = $user->where('id', '!=', decrypt($id));
            }
            $constraints = $user->get();
            $filtered =  $constraints->filter(function ($item) use ($request) {
                return (strtolower($item->u_user_id) == strtolower($request->user_name));
            })->first();

            if ($filtered) {
                return response()->json(false);
            } else {
                return response()->json(true);
            }
        } catch (\Exception $e) {
            return response()->json(false);
            // dd($e->getMessage());
        }
    }

    public function checkPermitCode(Request $request)
    {
        try {
            $id = $request->id;
            $user  = Organization::query();
            if ($id) {
                $user = $user->where('id', '!=', decrypt($id));
            }
            $constraints = $user->get();
            $filtered =  $constraints->filter(function ($item) use ($request) {
                return (strtolower($item->permit_code) == strtolower($request->permit_code));
            })->first();

            if ($filtered) {
                return response()->json(false);
            } else {
                return response()->json(true);
            }
        } catch (\Exception $e) {
            return response()->json(false);
            // dd($e->getMessage());
        }
    }

    public function checkEmail(Request $request)
    {
        try {
            $id = $request->id;

            $user  = User::query();
            if ($id) {
                $user = $user->where('id', '!=', decrypt($id));
            }
            $constraints = $user->get();
            $filtered =  $constraints->filter(function ($item) use ($request) {
                if ($item->u_email) {
                    return (strtolower(decrypt($item->u_email)) == strtolower($request->email));
                }
            })->first();
            if ($filtered) {
                return response()->json(false);
            } else {
                return response()->json(true);
            }
        } catch (\Exception $e) {
            return response()->json(false);
            // dd($e->getMessage());
        }
    }

    public function checkEmiratesId(Request $request)
    {
        try {
            $id = $request->id;
            $user  = User::query();
            if ($id) {
                $user = $user->where('id', '!=', decrypt($id));
            }
            $constraints = $user->get();
            $filtered =  $constraints->filter(function ($item) use ($request) {
                if ($item->u_emirates_id) {
                    return (strtolower(decrypt($item->u_emirates_id)) == strtolower($request->emirates_id));
                }
            })->first();
            if ($filtered) {
                return response()->json(false);
            } else {
                return response()->json(true);
            }
        } catch (\Exception $e) {
            return response()->json(false);
            // dd($e);
        }
    }

    public function checkMobileNo(Request $request)
    {
        try {
            $id = $request->id;
            $user  = User::query();
            if ($id) {
                $user = $user->where('id', '!=', decrypt($id));
            }
            $constraints = $user->get();
            $filtered =  $constraints->filter(function ($item) use ($request) {
                if ($item->u_mobile_no) {
                    return (decrypt($item->u_mobile_no) == $request->mobile_no);
                }
            })->first();
            if ($filtered) {
                return response()->json(false);
            } else {
                return response()->json(true);
            }
        } catch (\Exception $e) {
            return response()->json(false);
            // dd($e->getMessage());
        }
    }

    public function user_bulk_upload() {

        return view('users.bulk_upload_view');
    }
        }
