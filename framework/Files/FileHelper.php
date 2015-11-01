<?php


namespace Framework\Files;


class FileHelper
{
    static public function getUniqFileName($path, $extension = '')
    {
        do
        {
            $fileName = uniqid();
            if($extension)
                $fileName .= '.'.$extension;

            $file = $path.$fileName;

        }while(file_exists($file));

        return $fileName;
    }

    static public function getFileExtension($filePath)
    {
        $extension = (new \SplFileInfo($filePath))->getExtension();
        return ($extension == '') ? false : $extension;
    }

    static public function deleteFile($filePath)
    {
        return unlink($filePath);
    }

    static public function move($from, $to)
    {
        return rename($from, $to);
    }

    static public function isFileExist($filePath)
    {
        return file_exists($filePath);
    }
} 