<?php


namespace Framework\Files;


class FileSaver
{
    public $file;

    public $uploadedFile;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function save()
    {
            $temp = $this->file->getTemp();
            if(is_uploaded_file($temp) )
            {
                    $name = $this->file->uploadDir.$this->file->getName();

                    if(move_uploaded_file($temp, $name));
                    {
                        $this->uploadedFile = $name;
                        return true;
                    }
            }


        return false;

    }
} 