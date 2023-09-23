<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'tm_sponsors';

    protected $appends = ['status_name'];

    protected $fillable = [
        "org_id",
        'category_id',
        'img_path',
        'description',
        'url_link',
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

    public function category() {

        return $this->belongsTo(Category::class, "category_id");
    }
}
