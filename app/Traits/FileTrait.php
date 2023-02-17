<?php

namespace App\Traits;

use App\Models\Files;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileTrait
{
	public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Files::class, 'imageable');
	}


	public function getImg($name)
	{
		return $this->files->where('name', $name)->first();
	}


	private function getDirectoryPath($class, $id, $name, $filename = null)
	{
		return str_replace('\\', '/', public_path("/assets/frontend/files/$class/$id/$name/$filename"));
	}

	public function saveFile($name, $filepath) //inner, "D:\OpenServer\userdata\temp\upload\php3B09.tmp"
	{
		$object = $this;
		$class = get_class($object);
		$id = $object->id;
		$copyToDir = $this->getDirectoryPath($class, $id, $name);

		if (!is_dir($copyToDir)) {
			File::makeDirectory($copyToDir, 0755, true, true);
		}

		if (is_object($filepath) && $filepath instanceof UploadedFile) {
			/** @var $filepath UploadedFile */
			$fileName = $filepath->getClientOriginalName();
			$filepath->move($copyToDir, $fileName);

		} else if (is_string($filepath) && mb_strpos($filepath, 'https://') !== 0) {
			$fileName = File::basename($filepath);
			$copyToFile = "$copyToDir/$fileName";
			File::copy($filepath, $copyToFile);

		} else {
			$content = file_get_contents($filepath); //контент внутри файла
			$fileName = File::basename($filepath); //как он будет называться
			file_put_contents($copyToDir . "/" . $fileName, $content);
		}

		$object->files()->updateOrCreate([
			'name' => $name,
		], [
			'filename' => $fileName,
		]);
	}


	public function deleteFile($name)
	{
		$image = $this->getImg($name);
		$service = $this;
		$className = get_class($service);
		$objectId = $service->id;
		$name = $image->name;
		$fileName = $image->filename;
		$pathToImage = $this->getDirectoryPath($className, $objectId, $name, $fileName);
		File::delete($pathToImage);
		$image->delete();
	}


	public function saveUserFile($file){

		$object = $this;
		$id = $object->id;
		$fileName = $file->getClientOriginalName();
		$path = str_replace('\\', '/', public_path("/assets/frontend/files/userfiles/$id"));

		if(!is_dir($path)){
			File::makeDirectory($path, 0755, true, true);
		}
		$file->move($path, $fileName);


	}

}

