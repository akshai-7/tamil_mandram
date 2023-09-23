<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutiveCommittees extends Model
{
    use HasFactory;

    protected $table = 'tm_executive_committees';


    protected $fillable = [
        'org_id', 'name', 'designation', 'img_path', "description",
        'status', 'created_by',
        'updated_by', 'created_at',  'updated_at'
    ];
}
