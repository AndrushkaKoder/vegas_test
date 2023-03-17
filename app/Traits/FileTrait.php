<?php

namespace App\Traits;

use App\Models\Files;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait FileTrait
{
	public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Files::class, 'imageable');
	}


	public function getImg($name, $size = 'medium')
	{
		return $this->files
			->where('name', $name)
			->where('size', $size)
			->first();
	}


	private function getDirectoryPath($class, $id, $name, $size = null, $filename = null)
	{
		$dir = public_path("assets/frontend/files/$class/$id/" . implode('/', array_filter([
				$name,
				$size,
				$filename,
			])));
		return str_replace('\\', '/', $dir);
	}

	public function saveFile($name, $filepath) //inner, "D:\OpenServer\userdata\temp\upload\php3B09.tmp"
	{
		$a = 1;
		$object = $this;
		$class = get_class($object);
		$id = $object->id;
		$copyToDir = $this->getDirectoryPath($class, $id, $name);

		if (!is_dir($copyToDir)) {
			File::makeDirectory($copyToDir, 0755, true, true); //Если нет директории, создаем
		}

		if (is_object($filepath) && $filepath instanceof UploadedFile) {
			/** @var $filepath UploadedFile */
			$fileName = $filepath->getClientOriginalName();
			$tmpFilePath = "$copyToDir/$fileName";
			$filepath->move($copyToDir, $tmpFilePath);
		} else if (is_string($filepath) && mb_strpos($filepath, 'https://') !== 0) {
			$fileName = File::basename($filepath);
			$tmpFilePath = "$copyToDir/$fileName";
			File::copy($filepath, $tmpFilePath);
		} else {
			$content = file_get_contents($filepath); //контент внутри файла
			$fileName = File::basename($filepath); //как он будет называться
			$tmpFilePath = "$copyToDir/$fileName";
			file_put_contents($tmpFilePath, $content);
		}

		$sizes = [
			'medium' => ['resize' => []],
			'small' => ['resize' => []],
		];
		foreach ($sizes as $size => $config) {
			$this->resizeImage(
				$tmpFilePath,
				$this->getDirectoryPath($class, $id, $name, $size, $fileName),
				$config
			);
		}

		$object->files()->updateOrCreate([
			'name' => $name,
			'size' => 'medium'
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


	public function resizeImage($filepath, $saveToFile, $config)
	{
		$dir = File::dirname($saveToFile);
		if (!is_dir($dir)) {
			File::makeDirectory($dir, 0755, true, true);
		}

		$image = Image::make($filepath);
		$image->resize(100, 50);
		$image->save($saveToFile);
	}


}

