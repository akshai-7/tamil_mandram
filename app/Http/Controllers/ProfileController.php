<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
use App\Models\Gender;
use App\Models\Organization;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Nette\Utils\Json;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    use FileUpload;

    public function index()
    {
        $data = User::find(Auth::user()->id);
        $id = $data->id;
        $genders = Gender::get();
        // dd($data);
        $fileDecrypt = '';

        if (!Auth::user()->super_admin) {

            if (@$data->organization->org_logo) {
                $fileEncrypt = decrypt($data->organization->org_logo);
                $fileDecrypt = $this->fileDecrypt($fileEncrypt);
            }
        } else {
            if ($data->u_profile_image) {
                $fileEncrypt = decrypt($data->u_profile_image);
                $fileDecrypt = $this->fileDecrypt($fileEncrypt);
            }
        }



        return view(
            'profile',
            compact(
                'data',
                'fileDecrypt',
                'genders'
            )
        );
    }


    public function update(Request $request)
    {
        //ProfileRequest $request
        $id = decrypt($request->id);
        // dd($request->user_role);
        $user = User::find($id);
        try {
            DB::beginTransaction();
            $mobileNo = $request->u_mobile_no;
            $email = $request->u_email;


            if ($request->user_role == 2) {
                if ($request->image_src) {

                    $request->merge([
                        'org_logo'  => $this->FileEncrpty($request->image_src, "users_img"),
                    ]);
                }
            }


            if ($request->image_src && $request->user_role == 1) {
                $request->merge([
                    'u_profile_image'  => $this->FileEncrpty($request->image_src, "users_img"),
                ]);
            }

            $request->merge([
                'u_email'          => encrypt($email),
                'u_mobile_no'      => encrypt($mobileNo),
                'u_address'       => $request->u_address,
                'updated_by'       => Auth::user()->id,
            ]);


            $user->update($request->only('u_first_name', 'u_last_name', 'u_email', 'u_mobile_no', 'u_nationality','u_profile_image','u_address'));

            if ($request->user_role == 2) {
                $org = Organization::where('id', $user->organization_id)->first();
                // dd($org);
                $orgData = [
                    "org_name" => $request->u_first_name,
                    'org_email' => $user->u_email,
                    'org_mobile' => $user->u_mobile_no,
                    'address' => $request->u_address,
                    'updated_at' => Carbon::now(),
                ];


                if($request->org_logo) {
                    $orgData["org_logo"] = $request->org_logo;
                }

                $org->update($orgData);
            }

            DB::commit();

            return redirect('profile')->with(['success' => 'Profile updated Successfully!']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect('profile');
            // return $exception->getMessage();
        }
    }
}
