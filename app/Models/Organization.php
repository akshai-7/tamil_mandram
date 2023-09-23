<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'tm_organizations';
    protected $appends = ['decrypt_user_email', 'status_name','decrypt_mobile_no'];
    protected $fillable = [
        'user_id',
        'org_name',
        'org_code',
        'org_email',
        'mobile_no',
        'org_logo',
        'next_renewal_date',
        'subscription_type',
        "whatapp_heading",
        "whatapp_url",
        "header_color",
        "body_color",
        "footer_color",
        "contact_description",
        "about_us",
        'address',
        'status'
    ];


    public static function GetLastOrgCodeNumber()
    {
        $id = self::max('id');
        $id = $id + 1;

        if ($id <= 9) {
            return "100$id";
        } else if ($id <= 99) {
            return "10$id";
        } else if ($id <= 999) {
            return "0$id";
        } else {
            return "$id";
        }
    }

    public function nextRenewalDue() {

        $next_renewal_date = $this->next_renewal_date;
        $now = Carbon::now();
        $end = Carbon::parse($next_renewal_date);

        return $end->diffInDays($now);
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('status', "1");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id")->first();
    }

    public function createdBy()
    {
        return $this->user();
    }

    public function updatedBy()
    {
        return $this->user();
    }

    public function getDecryptUserEmailAttribute()
    {

        return $this->org_email ? decrypt($this->org_email) : "";
    }

    public function getDecryptMobileNoAttribute()
    {

        return $this->mobile_no ? decrypt($this->mobile_no) : "";
    }


    public function getStatusNameAttribute()
    {
        return $this->status ? "Active" : "InActive";
    }

    // public function getUserIdAttribute()
    // {
    //     return $this->user()->id;
    // }

    public function getCreatedUserNameAttribute()
    {

        return @$this->createdBy()->user_name;
    }

    public function getUpdatedUserNameAttribute()
    {

        return @$this->updatedBy()->user_name;
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, 'created_by', 'user_id');
    }
}
