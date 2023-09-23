<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use Illuminate\Support\Facades\Auth;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        $token=$request->header('token');
//       
//        if($request->segment(2)!='login'){
//        
//        if($token==""){
//            return response()->json(['is_error'=>true,'message'=>'Unauthorized User','details'=>[]], 401);
//        }
//        
//        if($token!=""){
//            
//            $user_details = Users::select('usergroup')
//                        ->where('user_status', '1')
//                        ->where('api_auth_key', $token)->whereIn('usergroup',['UG1004','UG1005'])
//                        ->first();
//            if($user_details==""){
//            return response()->json(['is_error'=>true,'message'=>'Unauthorized User','details'=>[]], 401);
//            }
//            
//         
//            
//            if($user_details->api_auth_key!=""){
//              
//                    if(date('Y-m-d H:i:s')>$user_details->api_auth_expiry_at){
//                
//                        $data = [
//                            "is_error" => true,
//                            "message" => "Unautorized User!",
//                            "details" => []
//                        ];
//                        return response()->json($data, 401);
//                    }
//                }
//        }
//        
//         }
        return $next($request);
       
    }
    
    public function AuthDetails(){
        return Auth::user();
    }
    
    
}
