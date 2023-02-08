<?php

    namespace App\Traits;

    use App\Models\Files;
    use Illuminate\Support\Facades\File;

    trait FileTrait
    {
        public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
        {
            return $this->morphMany(Files::class, 'imageable');
        }

        public function saveFile($name, $filepath)
        {
            $object = $this;
            $class = get_class($object);
            $id = $object->id;
            $copyToDir = str_replace('\\', '/', public_path("/assets/frontend/files/{$class}/{$id}/{$name}"));

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
    }

