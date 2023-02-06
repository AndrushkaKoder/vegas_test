<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Files extends Model
{
    use HasFactory;


    public function object(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {

        return $this->morphTo();

    }


}
