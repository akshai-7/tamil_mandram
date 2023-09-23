<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'tm_banner';

    protected $appends = ['status_name'];
    protected $fillable = [
        "org_id",
        'banner_image_path',
        'status',
        "created_by",
        "updated_by",
        'created_at',
        'updated_at'
    ];
    public function setPathAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }


    public function getStatusNameAttribute()
    {

        return $this->status ? "Active" : "inactive";
    }

    public function getImageBase64Attribute()
    {

        try {
            if (@$this->image_path) {

                $file = @$this->image_path ? decrypt($this->image_path)  : "";

                if (@$file) {
                    return @$this->fileDecrypt($file);
                } else {
                    return null;
                }
            } else {

                return null;
            }
        } catch (\Exception $e) {
            //
        }
    }


    public function scopeActiveStatus($query)
    {
        return $query->where('status', "1");
    }
}


