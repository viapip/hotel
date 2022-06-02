<?php

namespace App\Helpers\Images;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageConverter;

class Image
{
    public static function uploadImage($file, $image = null)
    {
        if ($image) {
            File::delete($image);
            File::delete($image . '.webp');
        }
        $extension = $file->extension();
        $name = date('mdYHis') . uniqid() . '.' . $extension;

        $folder = "uploads/images/" . date('Y-m-d') . "/";
        if (!file_exists($folder)) {
            File::makeDirectory($folder,0777,true);
        }

        $path = $folder . $name;
        $url = ImageConverter::make($file)->save($path, config('image.quality'));
        $basePath = $url->basePath();

        ImageConverter::make($url)->encode('webp')->save($path . '.webp');

        return $basePath;
    }

    public static function delete($image): JsonResponse
    {
        if (!File::delete($image) || !File::delete($image  . '.webp')) {
            return response()->json(['status' => 404, 'message' => 'Image not found'], 404);
        }

        return response()->json(['status' => 200, 'message' => 'Image successful deleted']);
    }
}
