<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

class Service extends Model
{
    use HasFactory;
    use FileTrait;

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($service) {
            $service->attributes['slug'] = Str::slug($service->title);
        });
    }
}
