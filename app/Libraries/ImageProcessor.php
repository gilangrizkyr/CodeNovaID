<?php

namespace App\Libraries;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use CodeIgniter\Files\File;

class ImageProcessor
{
    protected $manager;

    public function __construct()
    {
        // Use GD driver for v4
        $this->manager = new ImageManager(new GdDriver());
    }

    public function upload($file, $folder = 'uploads', $width = 800, $height = null, $quality = 80)
    {
        return $this->process($file, $folder, $width, $height, $quality);
    }

    public function process($file, $folder = 'uploads', $width = 800, $height = null, $quality = 80)
    {
        if (!$file->isValid()) {
            return false;
        }

        $newName = $file->getRandomName();
        $uploadPath = FCPATH . $folder;
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $image = $this->manager->decode($file->getTempName());

        // Resize - in v4 resize() takes width and height
        $image->resize($width, $height);

        // Save
        $image->save($uploadPath . '/' . $newName, $quality);

        return $folder . '/' . $newName;
    }

    public function createThumbnail($path, $width = 200, $height = 200)
    {
        $fileInfo = pathinfo($path);
        $thumbName = $fileInfo['filename'] . '_thumb.' . $fileInfo['extension'];
        $thumbPath = FCPATH . $fileInfo['dirname'] . '/' . $thumbName;

        $image = $this->manager->decode(FCPATH . $path);
        
        // Fit to square (cover in v4)
        $image->cover($width, $height);
        
        $image->save($thumbPath);

        return $fileInfo['dirname'] . '/' . $thumbName;
    }
}
