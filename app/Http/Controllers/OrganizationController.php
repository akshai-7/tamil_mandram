<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NativeLanguage;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\PermitType;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{

    use FileUpload;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        try {

            if ($request->ajax()) {

                $data = Organization::Query();
                $data = $data->orderBy("created_at", "desc");

                $dataTables = DataTables::of($data->get())
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search')['value'])) {

                            @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {

                                $value = $request->get('search')['value'];
                                $date = @$row['org_contract_expiry_date'] ? date('m-d-Y', strtotime(@$row['org_contract_expiry_date'])) :  "";
                                $created_at = @$row['created_at'] ? date('m-d-Y', strtotime(@$row['created_at'])) :  "";
                                $updated_at = @$row['updated_at'] ? date('m-d-Y', strtotime(@$row['updated_at'])) :  "";
                                if (Str::contains(Str::lower(@$row['org_name'], true), Str::lower($value, true))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['decrypt_user_email']), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower($date), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$created_at), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower($updated_at), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['smart_worker_strength']), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['status_name']), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['permit_type_name']), Str::lower($value))) {
                                    return true;
                                }
                                return false;
                            });
                        }
                    })
                    ->editColumn('org_email', function ($row) {
                        if ($row->org_email) {
                            return  decrypt($row->org_email);
                        }
                    })

                    ->addColumn('renewal_due', function ($row) {
                        if ($row->next_renewal_date) {
                            return  $row->nextRenewalDue();
                        }
                    })
                    ->editColumn('status', function ($row) {
                        if ($row->status == 1) {
                            return  '<td><span class="badge bg-success">Active</span></td>';
                        } else {
                            return '<td><span class="badge bg-danger">inactive</span></td>';
                        }
                    })
                    ->editColumn('created_at', function ($row) {
                        return date('m-d-Y', strtotime($row->created_at));
                    })
                    ->addColumn('action', function ($row) {
                        $btn  = '<a href="' . URL('organization', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  ><i class="fa fa-edit"></i></a>';
                        return $btn;
                    })

                    ->rawColumns(['action', 'status', 'renewal_due'])
                    ->make(true);

                return $dataTables;
            }

            return view(
                '
        organizations.list',
                //  compact(
                // 'data',
                //     'countries',
                //     'states',
                // 'cities'
                //  ),
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $LastOrgCode = Organization::GetLastOrgCodeNumber();

        return view('organizations.add', compact('LastOrgCode'));
    }

    public function store(Request $request)
    {

        try {

            // dd($request->all());
            DB::beginTransaction();
            $email = $request->org_email;
            $mobile = $request->u_mobile_no;
            $password = "123456";
            if (!empty($request->image_src)) {
                $request->merge([
                    'org_logo'  => $this->FileEncrpty($request->image_src, "org_logo"),
                ]);
            }
            $request->merge([
                'status'           => $request->input('status')  ? "1" : "0",
                'org_email'        => encrypt($email),
                'mobile_no'         => encrypt($mobile),
                'next_renewal_date' => date('Y-m-d', strtotime($request->next_renewal_date)),
            ]);
            $organization  = Organization::create($request->all());

            $u_user_id = $this->generateRandomString(6);
            $userData =  [
                'user_role'     => 2,
                'u_first_name'  => $organization->org_name,
                'u_email'        => encrypt($email),
                'u_mobile_no'   => encrypt($mobile),
                'u_user_id'     => $u_user_id,
                "u_address"     => $request->address,
                'password'      => bcrypt($password),
                'show_password' => encrypt($password),
                "super_admin"   => 0,
                "organization_id" => $organization->id,
                'status'         => $request->status,
                "created_by"   => Auth::user()->id
            ];

            $user = User::create($userData);

            $organization = Organization::find($organization->id);
            $organization->update(['user_id' => $user->id]);

            $categories = ["1" => "Platinum", "2" => "Gold", "3" => "silver"];

            // dd($categories);

            foreach ($categories as $category) {
                Category::create(['name' => $category, "org_id" => $user->id, "created_by" => Auth::user()->id, "status" => "1"]);
            }
            DB::commit();
            // mailto:iorgmanagement@gmail.com
            // password: iorgapp123!
            // Category::

            Mail::send('mail.web_login_details', ['user_name' => $u_user_id, "password" => $password, "org_code" => $organization->org_code, "org_name" => $organization->org_name], function ($message) use ($email) {
                $message->subject('Welcome to iOrg - Your Digital Hub for Organizational Success!');
                $message->to($email);
                $message->from("mailsupport@iorgapp.com", "iOrgapp");
            });
            return redirect('organization')->with(['success' => 'Organization created successfully']);
        } catch (\Exception $exception) {

            dd($exception);
            // DB::rollBack();
            return redirect('organization')->with(['error' => $exception->getMessage()]);
            // return $exception->getMessage();
        }
    }



    public function generateRandomString($length = 6)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
    }
    public function show($id)
    {
        $fileDecrypt = '';
        $data = Organization::where('id', decrypt($id))->first();
        $u_name = User::where('id', $data->user_id)->first();


        if ($filepath = $data->org_logo) {
            $fileEncrypt = decrypt($filepath);
            $fileDecrypt = $this->fileDecrypt($fileEncrypt);
        }



        return view(
            'organizations.edit',
            compact(
                'data',
                'fileDecrypt',
                'u_name',
                //     'genders',
                //     'countries',
                //     'states',
                //     'cities'
            )
        );
    }


    public function update($id, Request $request)
    {
        $id = decrypt($id);


        $organization = Organization::find($id);
        try {


            // dd($request->all());
            DB::beginTransaction();
            $email = $request->input('org_email');
            $mobile = $request->u_mobile_no;

            if ($request->image_src) {
                $request->merge([
                    'org_logo'  => $this->FileEncrpty($request->image_src, "org_logo"),
                ]);
            }
            $request->merge([
                'status'           => $request->input('status')  ? "1" : "0",
                'org_email'        => encrypt($email),
                'mobile_no'         => encrypt($mobile),
                'next_renewal_date' => date('Y-m-d', strtotime($request->next_renewal_date)),

            ]);

            $organization->update($request->except("user_id"));
            $user = User::where('id', $organization->user_id)->first();

            $userData =  [
                'u_first_name'    => $organization->org_name,
                'u_email'         => encrypt($email),
                "u_address"     => $request->address,
                'status'          => $request->status,
                'u_mobile_no'         => encrypt($mobile),
                'updated_by'      => Auth::user()->id,
            ];


            $user->update($userData);
            DB::commit();
            return redirect('organization')->with(['success' => 'Organization updated successfully']);
        } catch (\Exception $exception) {

            dd($exception);
            DB::rollBack();
            return redirect('organization');
            // return $exception->getMessage();
        }
    }

    public function whatAppSetting()
    {

        $data['data'] = Organization::where("user_id", Auth::user()->id)->first();

        return view('whatapp', $data);
    }


    public function saveWhatAppDetails(Request $request)
    {

        try {

            DB::beginTransaction();
            $organization = Organization::where("user_id", Auth::user()->id)->first();
            $organization->update($request->except("_token"));

            DB::commit();
            return redirect('whatapp')->with(['success' => 'Whatapp details updated successfully']);
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with(['errors' => $e->getMessage()]);;
        }
    }

    public function org_setting()
    {
        $data['data'] = Organization::where("user_id", Auth::user()->id)->first();
        return view('org_setting.add', $data);
    }


    public function saveColorSetting(Request $request)
    {

        try {

            DB::beginTransaction();
            $organization = Organization::where("user_id", Auth::user()->id)->first();
            $organization->update($request->except("_token"));

            DB::commit();

            return redirect('organization-setting')->with(['success' => 'Mobile app color setting updated successfully']);
        } catch (\Exception $e) {

            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);;
        }
    }

    public function contact()
    {
        $data['data'] = Organization::where("user_id", Auth::user()->id)->first();

        return view('contact', $data);
    }

    public function saveContact(Request $request)
    {

        try {

            DB::beginTransaction();
            $organization = Organization::where("user_id", Auth::user()->id)->first();
            $organization->update($request->except("_token"));
            DB::commit();
            return redirect('contact')->with(['success' => 'Contact details updated successfully']);
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with(['errors' => $e->getMessage()]);;
        }
    }

    public function checkMenu(Request $request)
    {

        try {
            $menu_id = $request->menu_id;
            $id = $request->id;

            $nativeLanguage  = NativeLanguage::query();
            if ($menu_id) {
                $nativeLanguage = $nativeLanguage->where('menu_id', '=', $menu_id)->where("org_id", Auth::user()->id);
            }

            if ($id) {
                $nativeLanguage = $nativeLanguage->where('id', '!=', $id);
            }
            $filtered = $nativeLanguage->first();

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



    public function saveAboutUs(Request $request)
    {

        try {

            DB::beginTransaction();
            $organization = Organization::where("user_id", Auth::user()->id)->first();
            $organization->update($request->except("_token"));
            DB::commit();
            return redirect('organization-setting')->with(['success' => 'About us details updated successfully']);
        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->with(['errors' => $e->getMessage()]);;
        }
    }
}
