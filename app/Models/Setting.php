<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'base_url',
        'api_key',
        'api_secret',
        'is_active'
    ];
}