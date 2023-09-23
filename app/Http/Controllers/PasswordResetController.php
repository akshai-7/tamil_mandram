<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\PasswordReset;

class PasswordResetController extends Controller
{
    public function updatePassword(PasswordResetRequest $request)
    {

        $id = @$request->id;
        if ($id) {
            $user = User::find(decrypt($id));
        } else {
            $user = User::find(Auth::user()->id);
        }
        try {
            $password = $request->password;

            $user->password = bcrypt($password);
            $user->show_password = encrypt($password);
            $user->save();

            $user_email = decrypt($user->u_email);
            $users = User::where('status', 1);
            $constraints = $users->get();

            $userCheck =  $constraints->filter(function ($item) use ($user_email) {
                if ($item->u_email) {
                    // dd($item->u_email);
                    return decrypt($item->u_email) == $user_email;
                }
            })->first();

            // $mail_id = @$userCheck->decrypt_email;
            // $subject = "Smart Labour - New Password";
            // $text = "New Password : " . $password;
            // Mail::send('mail.forget_mail', ['text' => $text], function (Message $m) use ($subject, $mail_id) {
            //     $m->to($mail_id);
            //     $m->subject($subject);
            // });

            return response()->json([
                'status' => true,
                'msg' => 'Your password changed successfully',
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function index()
    {
        return view('email');
    }

    public function resetPasswordShowForm($token)
    {
        return view('reset',  ['token' => $token]);
    }

    public function send_reset_password_email(Request $request)
    {
        // dd($request);
        $request->validate([
            'u_email' => 'required',
        ]);

        try {
            $user_email = $request->u_email;
            $users = User::where('status', 1);
            $constraints = $users->get();

            $user =  $constraints->filter(function ($item) use ($user_email) {
                if ($item->u_email) {
                    // dd($item->u_email);
                    return decrypt($item->u_email) == $user_email;
                    // dd($item);
                }
            })->first();

            if ($user == null) {
                return redirect('forget-password')->with(['error' => "Please check your Email address!"]);
            } else {
                // Generate Token
                $token = Str::random(64);
                $mail_id = @$user->decrypt_email;

                // // Saving Data to Password Reset Table
                PasswordReset::create([
                    'email'=>$request->u_email,
                    'token'=>$token,
                    'created_at'=> Carbon::now()
                ]);

                Mail::send('mail.web_forget_mail', ['token' => $token], function ($message) use ($mail_id) {
                    $message->subject('Reset Your Password');
                    $message->to($mail_id);
                    $message->from('support@iorgapp.com',"iOrgapp");
                });

                return redirect('login')->with(['success' => 'Reset Password link send to your registered email address!']);
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }


    public function reset(Request $request)
    {
        $request->validate([
            'u_email' => 'required',
            'password' => 'required|confirmed',
        ]);
        try {
            $user_email = $request->u_email;

            $users = User::whereIn('user_role',[1, 2])->where('status', 1);
            $constraints = $users->get();

            $userCheck =  $constraints->filter(function ($item) use ($user_email) {
                if ($item->u_email) {
                    return decrypt($item->u_email) == $user_email;
                }
            })->first();

            if(!$userCheck){
                return back()->withInput()->with('error', 'Invalid email id');
            }

            $updatePassword = PasswordReset::where([
              'email' => $request->u_email,
              'token' => $request->token
            ])
            ->first();

            if(!$updatePassword){
                return back()->withInput()->with('error', 'Reset password link token expired!');
            }

            $user = User::where('id', $userCheck->id)->first();
            $user->update([
            'password'      =>  bcrypt($request->password),
            'show_password' =>  encrypt($request->password)
        ]);

            // Delete the token after resetting password
             PasswordReset::where([
            'email' => $request->u_email,
            'token' => $request->token
          ])->delete();

            return redirect('login')->with(['success' => 'Password reset successfully!']);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
