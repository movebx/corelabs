<?php

namespace Framework\Images;


class Image
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
}