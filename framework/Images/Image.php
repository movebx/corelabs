<?php


namespace Framework\Images;


class Image
{
    protected $image;

    public function __construct($imagePath)
    {
        if(file_exists($imagePath))
            $this->image = $imagePath;

    }

    public function getThumbnail($thumbWidth, $thumbHeight)
    {
        list($width, $height) = ImageHelper::getImageSize($this->image);


    }
} 