<?php

namespace Framework\Request\Files;

use Framework\DI\Service;


class Files
{
    protected $uploadDir;
    protected $maxFileSize;
    protected $files;
    protected $inputNamesArray;



    public function __construct($inputNamesArray, $uploadDir, $maxFileSize)
    {
        $this->inputNamesArray = $inputNamesArray;
        $this->uploadDir = $uploadDir;
        $this->maxFileSize = $maxFileSize;

        $this->files = $_FILES;

    }

    public function save()
    {
        foreach($this->inputNamesArray as $inputName)
        {
            $temp = $this->getTemp($inputName);

            if(is_uploaded_file($temp) && ($this->getSize($inputName) < $this->maxFileSize))
            {
                //move_uploaded_file($temp, Service::getRootPath().'/'.$this->uploadDir);
            }
        }
    }

    public function getName($inputName)
    {
        return $this->files[$inputName]['name'];
    }

    public function getType($inputName)
    {
        return $this->files[$inputName]['type'];
    }

    public function getSize($inputName)
    {
        return $this->files[$inputName]['size'];
    }

    public function getTemp($inputName)
    {
        return $this->files[$inputName]['tmp_name'];
    }

    public function getError($inputName)
    {
        return $this->files[$inputName]['error'];
    }


} 