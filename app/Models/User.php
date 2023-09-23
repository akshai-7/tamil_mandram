<?php

namespace App\Models;

use App\Traits\FileUpload;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use \Laravel\Sanctum\HasApiTokens,
        HasFactory;

    protected $table = 'tm_users';
    protected $appends = ['user_name', "org_name", 'organization_name', "decrypt_mobile", "nationality_name", "decrypt_email", "decrypt_emirates_id"];
    //gender_name,nationality_name

    protected $fillable = [
        'u_code', 'user_role', 'u_full_name', 'u_first_name', 'u_middle_name', 'u_last_name', 'u_user_id', 'u_mobile_no', 'u_email', 'date_of_birth',
        'u_profile_image', 'u_designation', 'u_address', 'u_emirates_id', 'u_gender', 'u_nationality',
        'employee', 'driver_id', 'company_id', 'company_name', 'driver_type', 'type_of_permit', 'permit_issue_date', 'permit_expiry_date', 'permit_status',
        'u_country', 'u_state', 'u_city', 'u_pincode', 'password', 'show_password', 'created_by', 'updated_by',
        'remember_token', 'super_admin', 'organization_id', 'device', 'fcm_token', 'status', 'login_status', 'import_status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function driver()
    {
        return $this->belongsTo(DriverType::class, 'driver_type');
    }

    public function type_permit()
    {
        return $this->belongsTo(PermitType::class, 'type_of_permit');
    }

    public function getUserNameAttribute()
    {

        return ucwords(@$this->u_first_name . ' ' . @$this->u_last_name);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'u_gender');
    }
    public function getGenderNameAttribute()
    {
        return @$this->gender ? $this->gender()->first()->gender_name : "";
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'u_nationality');
    }

    public function getNationalityNameAttribute()
    {
        return $this->nationality ? $this->nationality->nationality_name : "11";
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'u_country');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'u_state');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'u_city');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, "id", "user_id");
    }

    public function getOrgNameAttribute()
    {
        return @$this->organization ? $this->organization->org_name : "";
    }

    public function getOrganizationNameAttribute()
    {
        return @Organization::where('user_id', $this->created_by)->first()->org_name;
    }

    public function getDecryptMobileAttribute()
    {

        return $this->u_mobile_no ? decrypt(@$this->u_mobile_no) : "";
    }

    public function getDecryptEmailAttribute()
    {

        return $this->u_email ? decrypt(@$this->u_email) : "";
    }


    public function getDecryptEmiratesIdAttribute()
    {

        return $this->u_emirates_id ? decrypt(@$this->u_emirates_id) : "";
    }

    public function assign_courses()
    {
        return $this->belongsToMany(CourseBasic::class, "sm_user_course_assign", "user_id", 'course_id')->withPivot(['course_results_id', 'learningpath_id']);
    }

    public function assign_learningpaths()
    {
        return $this->belongsToMany(LearningPath::class, "sm_user_course_assign", "user_id", 'learningpath_id')->withPivot(['course_results_id', 'learningpath_id']);
    }

    public function course_result()
    {
        return $this->belongsToMany(CourseResults::class, "sm_user_course_assign", "user_id", "course_results_id")->withPivot(['course_id', 'learningpath_id']);
    }


    public static function checkUserCount()
    {
        $organization = self::OrganizationUser();

        $user  = self::where('created_by', Auth::user()->id)->count();
        $smart_worker_strength  = @$organization->smart_worker_strength;

        // dd($smart_worker_strength,$user);
        if ($user >= $smart_worker_strength) {
            return true;
        }

        return false;
    }

    public static function organizationCourseSetting($model = null)
    {

        $authUser = Auth::user();
        $organization = self::OrganizationUser();

        $result = false;
        if ($authUser->super_admin && (@$model->created_by == $authUser->id)) {
            // echo "sds";
            $result = true;
        } else if (@$model && !$authUser->super_admin &&  $model->created_by == $authUser->id && @$organization->course_setting) {
            $result = true;
        } else if ($model == null && $authUser->super_admin) {
            $result = true;
        } else if (@$model == null && !$authUser->super_admin &&  @$organization->course_setting) {
            $result = true;
        } else {
            $result = false;
        }
        // dd($result);
        return $result;
    }

    public static function OrganizationUser()
    {
        return Organization::where('user_id', Auth::user()->id)->first();
    }


    public static function getProfileImage($filepath)
    {


        try {
            $fileName = decrypt($filepath);
            $newFileName = explode('/', $fileName);

            $decryptedContent  = self::fileDecrypt($fileName) ? base64_decode(self::fileDecrypt($fileName)) : "";


            $ImgName = str_replace(".dat", '', $newFileName[1]);

            $user_id = Auth::user()->id;
            if (Storage::exists('temp-data' . '/' . $user_id.'-'.$ImgName)) {
                return  config('app.url') . '/storage/app/temp-data/' . $user_id.'-'.$ImgName . '.png';
            } else {
                Storage::disk('local')->put('temp-data/' . $user_id.'-'.$ImgName . '.png', $decryptedContent);
                return  config('app.url') . '/storage/app/temp-data/' . $user_id.'-'.$ImgName . '.png';
            }
        } catch(\Exception $e) {
            return "";
        }
    }

    public static function fileDecrypt($filePath)
    {

        try {
            $encryptedContent = Storage::get($filePath);
            $decryptedContent = '';
            if ($encryptedContent) {
                $decryptedContent = $encryptedContent;
            }
            return $decryptedContent;
        } catch (\Exception $e) {
            // dd($e);
            return '';
        }
    }
    // public function checkOr


    public static function getorgsUsers($org_id=null) {
        $org_id = $org_id ? $org_id: Auth::user()->id;
        $ourganizationUsers = User::where("created_by", $org_id )->get();
        return $ourganizationUsers;
    }

    public static function getorgsUsersIds($org_id = null)
    {
        $ids = self::getorgsUsers($org_id);
        return count(@$ids) > 0 ? @$ids->pluck("id")->toArray() :  [];
    }


    public function examCount()
    {
        $courseResult = @$this->course_result()->where('status', '2')->where('alredy_completed_status','0')->count();
        return  $courseResult ? $courseResult : '0';
    }

    public function examPoints()
    {
        $courseResult = @$this->course_result()->where('status', '2')->where('alredy_completed_status','0')->sum('post_test_pass_score');
        return  $courseResult ? $courseResult : '0';
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function checkPermitExpiryDate()
    {

        $currentDate = Carbon::parse(date('d-m-Y'));
        $permit_expiry_date = $this->permit_expiry_date;

        if ($currentDate->gt($permit_expiry_date) && $permit_expiry_date) {
            return false;
        } else {
            return true;
        }
    }
}
