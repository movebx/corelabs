<?php

namespace Framework\Files;


class File
{
    protected $file;
    protected $maxSize;
    public $uploadDir;

    protected $name;

    public function __construct($file, $maxSize)
    {
        $this->file = $file;
        $this->name = $file['name'];
        $this->maxSize = ($maxSize * 1000); //в байты
    }



    public function setUploadDir($path)
    {
        $this->uploadDir = $path;
    }

    public function isNormalSize()
    {
        return $this->getSize() < $this->maxSize;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->file['type'];
    }

    public function getSize()
    {
        return $this->file['size'];
    }

    public function getTemp()
    {
        return $this->file['tmp_name'];
    }

    public function getError()
    {
        return $this->file['error'];
    }

}