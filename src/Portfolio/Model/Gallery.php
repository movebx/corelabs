<?php

namespace Portfolio\Model;


use Framework\DI\Service;
use Framework\Files\FileHelper;
use Framework\Model\ActiveRecord;

class Gallery extends ActiveRecord
{
    static public function getTable()
    {
        return 'images';
    }

    public function getImages()
    {
        return self::findAll();
    }

    public function deleteImage($id)
    {
        $image = self::findById($id);

        //Service::get('logger')->log(ASSETS.'uploads/portfolio/gallery'.$image->name);

        if(!FileHelper::deleteFile(ASSETS.'uploads/portfolio/gallery/'.$image->name))
            return false;

        return self::deleteById($id);
    }
} 