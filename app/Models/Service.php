<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Service extends Model
{
    use HasFactory;


    public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Files::class, 'imageable');
    }



//    public function image1()
//    {
//        $item = self::find(1);
//        $file = new Files();
//        $file->filename = '223';
//        $file->name = 'list';
//        //$file->name = 'main';
//        $item->files()->save($file);
//        $file->saveFile(public_path('_files/avto.jpg'));
//        return $this->files()->where('name', 'image1');
//    }

    public function getImg($name)
    {
        return $this->files->where('name', $name)->first();
    }


    public function saveFile($filepath)
    {
        $filename = File::basename($filepath);
        $object = $this->object;
        $class = get_class($object);
        $id = $object->id;
        $name = $this->name;
        $dir = public_path("files/{$class}/{$id}/{$name}");
    }








}
