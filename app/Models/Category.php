<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tm_category';

    protected $appends = ['status_name'];

    protected $fillable = [
        "org_id",
        'name',
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

    public function scopeActiveStatus($query)
    {
        return $query->where('status', "1");
    }

    public function sponsor() {

        return $this->hasMany(Sponsor::class,"category_id");
    }
}
