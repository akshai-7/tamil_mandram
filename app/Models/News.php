<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;



    protected $table = 'tm_news';

    protected $appends = ['status_name'];
    protected $fillable = [
        'org_id',
        'name',
        'img_path',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    public function setPathAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }


    public function getStatusNameAttribute()
    {

        return $this->status ? "Active" : "Inactive";
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
