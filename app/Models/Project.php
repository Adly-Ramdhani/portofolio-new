<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public $incrementing = false; 
    protected $keyType   = 'string';

    protected $fillable = [
        'title',
        'role',
        'description',
        'image',
        'tech_stack', 
        'key_features',
        'github_link',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'key_features' => 'array', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

}
