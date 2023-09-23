<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NativeLanguage extends Model
{
    use HasFactory;

    protected $table = 'tm_native_language';

    protected $appends = ['status_name'];
    protected $fillable = [
        'name',
        "menu_id",
        "org_id",
        "status",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];


    public function getStatusNameAttribute()
    {
        return $this->status ? "Active" : "Inactive";
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, "menu_id");
    }


}
