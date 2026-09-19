<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = ['title', 'description', 'icon', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
