<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tm_menu';

    protected $appends = ['status_name'];
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];


    public function getStatusNameAttribute()
    {

        return $this->status ? "Active" : "Inactive";
    }


}
