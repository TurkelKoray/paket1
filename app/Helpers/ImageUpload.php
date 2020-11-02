<?php
declare(strict_types = 1);

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Image;

class ImageUpload
{
    public function storeUserAvatar(UploadedFile $uploadedFile)
    {
        $uploadsDir = storage_path() . '/avatars/';
        $fileName   = time() . '.' . $uploadedFile->getClientOriginalExtension();
        return Image::make($uploadedFile)->save($uploadsDir . $fileName);
    }

    public function updateAvatar(UploadedFile $uploadedFile, $imageFolder)
    {
        $uploadDir = storage_path() . '/' . $imageFolder . '/';
        $fileName  = $this->fileName($uploadedFile);
        return Image::make($uploadedFile)->save($uploadDir . $fileName);
    }

    public function fileName($uploadedFile)
    {
        $fileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
        return $fileName;
    }

    public function storeBlogImage(UploadedFile $uploadedFile)
    {
        $uploadsDir = storage_path() . '/blogImage/';
        $fileName   = time() . '.' . $uploadedFile->getClientOriginalExtension();
        return Image::make($uploadedFile)->save($uploadsDir . $fileName);

    }


}