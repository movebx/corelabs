<?php


namespace Framework\Files;


class FileSaver
{
    protected $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function save()
    {
            $temp = $this->file->getTemp();
            if(is_uploaded_file($temp) )
                if($this->file->isNormalSize())
                {
                    move_uploaded_file($temp, $this->file->uploadDir.$this->file->getName());
                    return true;
                }


        return false;

    }
} 