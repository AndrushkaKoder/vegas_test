<?php

namespace App\Traits;

use App\Models\Files;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait FileTrait
{
	protected $baseConfigSizeImages = [
		'inner' => [
			'medium' => [
				'resize' => ['width' => '500', 'height' => '500'],
				'ratio' => true
			],
			'small' => [
				'resize' => ['width' => '100', 'height' => '100'],
				'ratio' => false
			],
		],
		'outer' => [
			'medium' => [
				'resize' => ['width' => '500', 'height' => '500'],
				'ratio' => true
			],
			'small' => [
				'resize' => ['width' => '100', 'height' => '100'],
				'ratio' => false
			],
		]
	];

	public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
	{
		return $this->morphMany(Files::class, 'imageable');
	}

	public function getImg($name)
	{
		return $this->files
			->where('name', $name)
			->first();
	}

	public function getImgPath($name, $size)
	{
		if ($img = $this->getImg($name))
			return $img->getPath($size);

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

	public function configSizeImages()
	{
		if ($this->configSizeImages)
			return $this->configSizeImages;

		return $this->baseConfigSizeImages;
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

		$configuration = Arr::get($this->configSizeImages(), $name);
		foreach ($configuration as $size => $config) {
			$this->resizeImage(
				$tmpFilePath,
				$this->getDirectoryPath($class, $id, $name, $size, $fileName),
				$config
			);

			$object->files()->updateOrCreate([
				'name' => $name,
			], [
				'filename' => $fileName,
			]);
		}
		File::delete($this->getDirectoryPath($class, $id, $name, $fileName));
	}

	public function deleteFile($name)
	{
		$configuration = Arr::get($this->configSizeImages(), $name);

		foreach ($configuration as $size => $config) {
			$image = $this->getImg($name);
			$service = $this;
			$className = get_class($service);
			$objectId = $service->id;
			$name = $image->name;
			$fileName = $image->filename;
			$pathToImage = $this->getDirectoryPath($className, $objectId, $name, $size, $fileName);
			File::delete($pathToImage);

			$dir = dirname($pathToImage);
			if (!count(File::allFiles($dir)))
				File::deleteDirectory($dir);

			$image->delete();
		}
	}

	public function resizeImage($filepath, $saveToFile, $config)
	{
		$dir = File::dirname($saveToFile);
		if (!is_dir($dir)) {
			File::makeDirectory($dir, 0755, true, true);
		}

		$image = Image::make($filepath);
		if ($config['ratio']) {
			$image->resize($config['resize']['width'], $config['resize']['height'], function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});
		} else {
			$image->resize($config['resize']['width'], $config['resize']['height']);
		}
		$image->save($saveToFile, 90);
	}


}

