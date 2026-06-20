<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ApiDocumentation extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'module', 
        'name', 
        'method', 
        'endpoint', 
        'description', 
        'request', 
        'response'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'request' => 'array',
            'response' => 'array',
        ];
    }
}