<?php

namespace App\Imports;

use App\StaffImport;
use App\Users;
use App\Shift;
use Hash;
use App\Usergroup;
use App\Nationality;
use App\Http\Controllers\HomeController;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportStaff implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // var_dump($row);
        // exit;
        //dd(@$row[0]);
        // $get_max_id = Users::max('id');
        // $user_id = HomeController::autoUserId($get_max_id);

         if(@$row['group'] !=''){
                $role=array("CA"=>"2","SSO"=>"4","SO"=>"5","SW"=>"6","SS"=>"8","SSS"=>"9","CSO"=>"10","ME"=>"11","HR"=>"12","CC"=>"13","OM"=>"16","OD"=>"17","OE"=>"18");
        $usergroup_id = @$row['group'];
        @$group_id = @$role[$usergroup_id];
        //dd(@$role[$usergroup_id]);
            }
            else{
                $valid_status = '3';
                $comment = 'Please add Group. ';
            }

        $usergroup = Usergroup::select('user_group_id')->where('id', @$group_id)->first();
        

        //$gender_array = array("Male"=>"1","FeMale"=>"2","Others"=>"3");
       $gender1 = @$row['gender'];


        if (strtolower($gender1) == "male") {
            $gender = 1 ;
        } else if(strtolower($gender1) == "female") {
            $gender = 2 ;
        } else{
            $gender = 3 ;
        }

        // $property_array = array("Property A"=>"12","Property B"=>"19","Property C"=>"23");
        // $property = @$row['property'];

        $maritalastatus_array = array("Single"=>"1","Married"=>"2","Widowed"=>"3","Divorced"=>"4");
        $maritalastatus = @$row['marital_status'];       

       
        

       // $shift = Shift::select('id')->where('shift_name','like','%'.$row['shift'].'%')->first();
        //dd($shift['id']);
        $nationality = Nationality::select('nationality_id')->where('nation','like','%'.$row['nationality'].'%')->first();
        // $company = Users::select('id')->where('company_name','like','%'.$row['company'].'%')->first();
//dd($row['email']);

$Users = \App\Users::all();
            // check unique mobile no /
            if(@$row['mobile_no'] !=''){
                $mobile_no  = @$row['mobile_no'];
               
        
                $valid_status = '1';
                $comment = ' ';
        
                    $filtered =  $Users->filter(function ($item) use ($row)  {
                        if($item->mobile_no ) {
                            return (Crypt::decrypt($item->mobile_no) == @$row['mobile_no'] );
                        }
                    })->first();
                    if($filtered){
                        $valid_status = '2';
                        $comment = 'Mobile Number is already used. ';
                    }
        
            }
            else{
                $valid_status = '3';
                $comment = 'Please add Mobile Number. ';
            }
           

            // check passport /
            // $filtered1 =  $Users->filter(function ($item) use ($row)  {
            //     if($item->passport_no ) {
            //         return (Crypt::decrypt($item->passport_no) == @$row['passport_number'] );
            //     }
            // })->first();
            // if($filtered1){
            //     $valid_status = '2';
            //     $comment = 'Passport Number is already used. ';
            // }
            if(@$row['nric'] ==''){
                $valid_status = '3';
                $comment = 'Please add NRIC. ';
            }
            else
            {

            $filtered2 =  $Users->filter(function ($item) use ($row)  {
                if($item->nric ) {
                    return (Crypt::decrypt($item->nric) == @$row['nric'] );
                }
            })->first();
            if($filtered2){
                $valid_status = '2';
                $comment = 'NRIC is already used. ';
            }
        }

            if(@$row['email'] ==''){
                $valid_status = '3';
                $comment = 'Please add Email. ';
            }

        return new StaffImport([
            //'property_id' => @$property_array[$property],
            'user_name' => @$row['mobile_no'],
           'email' => @$row['email'],
           'first_name' => @$row['name'],
           'mobile_no' => Crypt::encrypt(@$row['mobile_no']),
           'gender' => @$gender,
           'nric' => Crypt::encrypt(@$row['nric']),
           'password' => Hash::make(@$row['mobile_no']),
           'usergroup' => $usergroup['user_group_id'],
           'usergroup_id' => @$role[$usergroup_id],
           'address' => @$row['address'],
           'dob' => date('Y-m-d', strtotime(@$row['dob'])),
           'postal_code' => @$row['postal_code'],
           'nationality' => @$nationality['nationality_id'],
           //'shift' => @$shift['id'],
           'marital_status' => @$maritalastatus_array[$maritalastatus],
           //'passport_no' => Crypt::encrypt(@$row['passport_number']),
           //'company_id' => @$company['id'],
           'valid_status' => @$valid_status,
           'comment' => @$comment,
        ]);
    }
}
