<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Hash;
use Crypt;
use Illuminate\Routing\Controller as BaseController;
use App\Users;
//use App\AuthendicationAuth;
use App\Http\Controllers\HomeController;
use App\JobTrainiCertificate;
use App\Models\Organization;
use App\Models\User;
use App\Models\UserFcm;
use App\UserDocument;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;

class LoginController extends BaseController
{

    public $successStatus = 200;

    public function __construct()
    {
        //

    }

    public function login(Request $request)
    {

        //    $authendication_key = $request->header('x-api-key');
        $validator = Validator::make($request->all(), [
            "org_code" => 'required',
            'device' => 'required',
            'fcm_token' => 'required',

        ]);


        if ($validator->fails()) {
            $data = array("is_error" => true, "message" => $validator->messages());
            return response()->json($data, 200);
        }

        $Organization = Organization::where("org_code", $request->org_code)->where("status","1")->first();

        if (!$Organization) {
            $data = [
                "is_error" => true,
                "message" => "In-valid organization code.Please try again.",
                "details" => []
            ];
            return response()->json($data, 200);
        }

        $org_user = $Organization->user();
        $username = $org_user->u_user_id;
        $password = decrypt($org_user->show_password);
        $fcm_token = $request->input('fcm_token');
        $device = ($request->input('device') == "1") ? "1" : (string)$request->input('device');


        if (Auth::attempt(['u_user_id' => $username, 'password' => $password])) {

            try {

                $user_details =  user::where('id', Auth::user()->id)->where('status', '1')->first();

                if ($user_details) {

                    $token = $user_details->createToken('auth_token')->plainTextToken;

                    $user_details->update(['login_status' =>'1']);

                    if (!$token) {
                        $data = [
                            "is_error" => true,
                            "message" => "Unable to create user Token..!",
                            "details" => []
                        ];
                        return response()->json($data, 200);
                    }


                    /*Generation Auth key*/
                    $update_fcm_token = User::where('id', $user_details->id)->update(['fcm_token' => $fcm_token, 'device' =>  $device]);
                    $data = [
                        "is_error" => false,
                        "message" => "Success!",
                        "token" => $token,
                    ];

                    UserFcm::where("fcm",$request->fcm_token)->delete();
                    UserFcm::firstOrCreate(['fcm'=> $request->fcm_token,'org_id'=>Auth::user()->id]);
                    DB::commit();
                } else {
                    $data = [
                        "is_error" => true,
                        "message" => "Wrong password please try again",
                    ];
                    return response()->json($data, 200);
                }
            } catch (Exception $ex) {

                $message = $ex->getMessage();

                DB::rollback();
                $data = [
                    "is_error" => true,
                    "message" => $message,
                ];
            } catch (\Illuminate\Database\QueryException $ex) {
                //             Note any method of class PDOException can be called on $ex.
                $message = $ex->getMessage();
                DB::rollback();
                $data = [
                    "is_error" => true,
                    "message" => $message
                ];
            } catch (DecryptException $ex) {
                $message = $ex->getMessage();
                DB::rollback();
                $data = [
                    "is_error" => true,
                    "message" => $message
                ];
            }
        } else {
            $data = [
                "is_error" => true,
                "message" => "Wrong password please try again",
            ];
            return response()->json($data, 200);
        }

        return response()->json($data, 200);

        return response()->json($data, 200);
    }



    public function resetPassword(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            $data = array("is_error" => true, "message" => $validator->messages());
            return response()->json($data, 200);
        }


        //
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');


        $user = Users::find(auth()->user()->id);

        if (!Hash::check($request->input('old_password'), $user->password)) {
            $data = array("is_error" => true, "message" => "Old Password is wrong");
            return response()->json($data, 200);
        }

        if (Hash::check($request->input('new_password'), $user->password)) {
            $data = array("is_error" => true, "message" => "Old Password and New Password is same");
            return response()->json($data, 200);
        }




        $update_password = Users::where(['id' => auth()->user()->id])->update(['password' => Hash::make($new_password)]);

        $params = ["action_id" => 'resetPassword', "crud_id" => "Edit", "menu" => "resetPassword", "comments" => "resetPassword", "action_data" => request()->all(), "log_from" => 'API'];
        UserActivity($params);

        $data = array("is_error" => false, "message" => "Password changed successfully!");
        return response()->json($data, 200);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            "is_error" => false,
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
        ]);

        if ($validator->fails()) {
            $data = array("is_error" => true, "message" => $validator->messages());
            return response()->json($data, 200);
        }




        try {
            $username = $request->input('username');

            $check_username = Users::where('user_name', $username)->whereIn('usergroup', ['UG1004', 'UG1005'])->where('user_status', '1')->first();
            if ($check_username == "") {
                $data = array("is_error" => true, "message" => "Please check your Username!");
            } else {
                try {
                    $password = $this->generateRandomString();
                    $user_details = Users::where('user_name', $username)->where('user_status', '1')->first();
                    $passworda = Hash::make($password);
                    $id = $user_details->id;

                    $update_pwd = Users::where('id', $id)->update(['password' => $passworda]);

                    $mail_id = decrypt($user_details->email);
                    $subject = "E-Security Patrol - New Password";
                    $text = "New Password : " . $password;
                    Mail::send('forget_mail', ['text' => $text], function ($m) use ($subject, $mail_id) {
                        $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                        $m->to($mail_id);
                        $m->subject($subject);
                    });
                } catch (\Exception $e) {
                    //
                }


                $params = ["action_id" => 'Forget Password', "crud_id" => "Edit", "menu" => "forgetPassword", "comments" => "Forget Password", "action_data" => request()->all(), "log_from" => 'API'];
                UserActivity($params);

                $data = array("is_error" => false, "message" => "Reset Password link sented your registered email address!");
            }
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            DB::rollback();
            HomeController::insertLog('App - Forget Password', $message);
            $data = [
                "is_error" => true,
                "message" => "Please try again later!",
                "details" => []
            ];
        } catch (\Illuminate\Database\QueryException $ex) {
            //             Note any method of class PDOException can be called on $ex.
            $message = $ex->getMessage();
            DB::rollback();
            HomeController::insertLog('App - Forget Password', $message);
            $data = [
                "is_error" => true,
                "message" => "Please try again later!",
                "details" => []
            ];
        } catch (DecryptException $ex) {
            $message = $ex->getMessage();
            DB::rollback();
            HomeController::insertLog('App - Forget Password', $message);
            $data = [
                "is_error" => true,
                "message" => "Please try again later!",
                "details" => []
            ];
        }

        return response()->json($data, 200);
    }

    function generateRandomString($length = 8)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

}
