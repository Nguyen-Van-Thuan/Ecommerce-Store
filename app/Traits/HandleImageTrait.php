<?php

namespace App\Traits;

use Image;
use Illuminate\Support\Facades\Storage;

trait HandleImageTrait
{
    protected string $path = 'public/upload/';

    public function verify($request)
    {
        return $request->has('image');
    }

    public function saveImage($request)
    {
    }

    public function updateImage($request, $currentImage)
    {
        if ($this->verify($request)) {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }

    public function deleteImage($imageName)
    {
    }
}
