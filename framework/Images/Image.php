<?php

namespace Framework\Images;


class Image
{
    static public function getImageMimeType($filePath)
    {
        $size = getimagesize($filePath);
        return $size ? $size['mime'] : NULL;
    }
}