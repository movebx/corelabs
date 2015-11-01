<?php

namespace Framework\Images;


use Framework\Files\FileHelper;

class ImageHelper
{
    static public function getImageSize($filePath)
    {
        $size = getimagesize($filePath);
        return $size ? $size : NULL;

    }

    static public function getImageMimeType($filePath)
    {
        $size = self::getImageSize($filePath);
        return $size ? $size['mime'] : NULL;
    }

    static public function isImage($filePath, $types)
    {
        $extension = FileHelper::getFileExtension($filePath);

        if(in_array($extension, $types))
            return true;

        return false;
    }


}