<?php

namespace Portfolio\Model;


use Framework\DI\Service;
use Framework\Files\FileHelper;
use Framework\Files\FileSaver;
use Framework\Images\ImageHelper;
use Framework\Model\ActiveRecord;
use Framework\Files\File;
use Framework\Request\Request;
use Framework\Response\ResponseRedirect;

class AddImage extends ActiveRecord
{
    protected $image;

    static public function getTable()
    {
        return 'images';
    }


    public function uploadImage($image, $alt)
    {
        try
        {
            $file = new File($image, 10000);

            $uploadDir = ASSETS.'uploads/portfolio/gallery/';
            $tmp = ASSETS.'uploads/portfolio/tmp/';
            $file->setUploadDir($tmp);

            $fileSaver = new FileSaver($file);

            if(!$file->isNormalSize())
                throw new \Exception('Very big file size');

            if (!$fileSaver->save())
                throw new \Exception('File not selected');

            if(!ImageHelper::isImage($fileSaver->uploadedFile, ['gif', 'png', 'jpg']))
                throw new \Exception('File is not image');

            if(file_exists($uploadDir.$file->getName()))
            {
                $uniqName = FileHelper::getUniqFileName($uploadDir, FileHelper::getFileExtension($file->getName()));


                $file->setName($uniqName);
            }

            FileHelper::move($fileSaver->uploadedFile, $uploadDir.$file->getName());



            $db = Service::get('db');

            $query = 'INSERT INTO '.self::getTable().'(name, alt) VALUES (:name, :alt)';

            $stmt = $db->prepare($query);

            if(!$stmt->execute([':name' => $file->getName(), ':alt' => $alt]))
                throw new \Exception('File not saved into DB');


            Service::get('session')->setFlushMsg('success', 'File successfully downloaded');

        }
        catch(\Exception $e)
        {
            Service::get('session')->setFlushMsg('error', $e->getMessage());
            $response = new ResponseRedirect(Request::getHost().'/admin');
            $response->send();
        }
    }
} 