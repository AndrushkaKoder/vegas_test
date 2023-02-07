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

    public function getPath($relative = true)
    {
        $path = "/files/$this->imageable_type/$this->imageable_id/$this->name/$this->filename";
        $path = str_replace('\\', '/', $path);

        if ($relative) {
            return $path;
        }

        return public_path($path);
    }

}
