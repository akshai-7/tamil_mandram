<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category_name';

    protected $fillable = [
         'category_name ', 'status', 'Created_At', 'Modified_At'
    ];

}
