<?php


namespace Framework\Files;


class FileHelper
{
    static public function getRandomFileName($path, $extension = '')
    {
        do
        {
            $fileName = uniqid();
            if($extension)
                $fileName .= $extension;

            $file = $path.'/'.$fileName;

        }while(file_exists($file));

        return $file;
    }

    static public function getFileExtension()
    {

    }

    static public function deleteFile($filePath)
    {
        return unlink($filePath);
    }

} 