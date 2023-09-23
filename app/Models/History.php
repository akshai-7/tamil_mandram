<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'tm_history';

    protected $appends = ['status_name'];
    protected $fillable = [
        "org_id",
        "img_path",
        "history_description",
        'status',
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
            if (@$this->img_path) {

                $file = @$this->img_path ? decrypt($this->img_path)  : "";

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


