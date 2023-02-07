<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\helpers\ModelHelper;

class Service extends Model
{
    use HasFactory;


    public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Files::class, 'imageable');
    }

//Вынести в трейт savefile, files, getImg

    public function saveFile($name, $filepath)
    {
        $object = $this;
        $class = get_class($object);
        $id = $object->id;
        $copyToDir = str_replace('\\', '/', public_path("files/{$class}/{$id}/{$name}"));

        if (!is_dir($copyToDir)) {
            File::makeDirectory($copyToDir, 0755, true, true);
        }

        if (mb_strpos($filepath, 'https://') !== 0) {
            $fileName = File::basename($filepath);
            $copyToFile = "{$copyToDir}/{$fileName}";


            File::copy($filepath, $copyToFile);
        } else {
            $content = file_get_contents($filepath); //контент внутри файла
            $fileName = File::basename($filepath); //как он будет называться
            file_put_contents($copyToDir . "/" . $fileName, $content);
        }


        Files::query()->create([
            'name' => $name,
            'filename' => $fileName,
            'imageable_id' => $id,
            'imageable_type' => $class

        ]);
    }

    public function getImg($name)
    {
        return $this->files->where('name', $name)->first();
    }



    protected static function booted()
    {
        parent::booted();

        static::creating(function ($service) {

            $service->attributes['slug'] = Str::slug($service->title);

        });
    }


}

//
