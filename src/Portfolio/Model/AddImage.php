<?php

namespace Portfolio\Model;


use Framework\Files\FileSaver;
use Framework\Model\ActiveRecord;
use Framework\Files\File;

class AddImage extends ActiveRecord
{
    protected $image;

    static public function getTable()
    {
        return 'images';
    }


    public function uploadImage($image)
    {
        $file = new File($image, 10000);

        $uploadDir = ASSETS.'uploads/';
        $file->setUploadDir($uploadDir);

        $fileSaver = new FileSaver($file);
        $fileSaver->save();
        



    }
} 