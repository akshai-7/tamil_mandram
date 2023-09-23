<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'notifications';
    protected $fillable = [
        'org_id', 'fcm_token', 'response_data', 'notification_token_id', 'is_read', 'is_important', 'updated_at', 'created_at'
    ];
}
