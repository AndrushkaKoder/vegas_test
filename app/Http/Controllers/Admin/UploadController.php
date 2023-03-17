<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \Intervention\Image\Facades\Image;


class UploadController extends Controller
{

	public function processImage()
	{

		$file = storage_path('app/storage/files/8fkzXddQHimGV5GodY334G0rHxQJMza586IfTEkI.png');
		$image = Image::make($file)->resize(50, 50);
		$image->save();

		$response = response()->make($image->encode('png', 100));


		$response->header('Content-Type', 'image/png');

		return $response;

//		if ($file) {
//			$file->move('../public' . $path, $fileName);
//			$gThumb = $this->createThumbnail(219, 300, '../public/images', 'image', 'png', 'thumb', true);
//			$pThumb = $this->createThumbnail(300, 300, '../public/images', 'image', 'png', 'pthumb');
//			return response()->json([
//				'gallery_thumbnail' => $path . '/' . $gThumb,
//				'upload_thumbnail' => $path . '/' . $pThumb
//			]);
//		}
	}

//	function createThumbnail($height, $width, $path, $filename, $extension, $postfix = null, $mask = null)
//	{
//		$mode = ImageInterface::THUMBNAIL_OUTBOUND;
//		$size = new Box($width, $height);
//		$postfix = $postfix ? $postfix : 'thumb';
//
//
//		$thumbnail = Imagine::open("{$path}/{$filename}.{$extension}")->thumbnail($size, $mode);
//		if ($mask) {
//			$mask = Imagine::open('../public/images/masks/bubble-splash.png');
//			$thumbnail->applyMask($mask);
//		}
//		$destination = "{$filename}" . "." . $postfix . "." . "{$extension}";
//
//		$thumbnail->save("{$path}/{$destination}");
//		return $destination;
//	}


}
