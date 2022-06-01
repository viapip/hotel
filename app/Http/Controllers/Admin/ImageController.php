<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Images\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageConverter;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            return $requestData['image'] = Image::uploadImage($request->image);
        }
        return false;
    }

    public function delete(Request $request): JsonResponse
    {
        return Image::delete($request->image);
    }
}
