<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryIcon extends Model
{
    protected $table = 'category_icons';

    protected $fillable = [
        'name',
        'icon',
        'status',
    ];
}
