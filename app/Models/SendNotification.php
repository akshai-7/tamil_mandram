<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendNotification extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'tm_send_notification';

    protected $fillable = [
        'org_id','title','message','updated_by','created_by','updated_at','created_at'
    ];
}
